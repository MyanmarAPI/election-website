<?php

namespace App;

use Auth;
use App\User;
use App\Token;
use GuzzleHttp\Client;
use Jenssegers\Mongodb\Model;

/**
 * API Register Application Model.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Application extends Model
{
	/**
     * The database collection used by the model.
     *
     * @var string
     */
    protected $collection = 'applications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'key', 'type', 'user_id', 'disable'];

    /**
     * Relationship for user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * Relationship for token model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tokens()
    {
        return $this->hasMany('App\Token', 'app_id');
    }

    public function textOfType()
    {
        switch ($this->type) {
            case 'android':
                return 'A';
                break;

            case 'ios':
                return 'I';
                break;

            case 'web':
                return 'W';
                break;
            
            default:
                return null;
                break;
        }
    }

    public static function getForAdminIndex($type = null, $limit = 20)
    {
        $ins = new static;

        //$ins = $ins->with('tokens');

        if ( $type) {
            $ins = $ins->where('type', $type);
        }

        return $ins->with('user')->paginate($limit);
    }

    public static function getByIdForUser($id, $user)
    {
        $ins = new static;

        return $ins->ownBy($user)->where('_id', '=', $id)->firstOrFail();
    }

    public static function getAppForSelect($user)
    {
        $ins = new static;

        if ($user->isAdmin()) {
            return $ins->get(['key', 'name'])->toArray();
        }
        
        return $ins->ownBy($user)->get(['key', 'name'])->toArray();    
        
    }

    public static function getMostUsedApps($count = 5)
    {
        $ins = new static;
        
        $token_counts = Token::getAppTokenCounts();

        return array_map(function($app) use($ins){

            $info = $ins->where('key', $app['_id'])->first(['_id','name', 'key']);

            $app['id'] = $info->id;

            $app['name'] = $info->name;

            $app['key'] = $info->key;

            unset($app['_id']);

            return $app;

        }, array_slice($token_counts, 0, $count));

    }

    public static function getMostActiveApps($count = 5)
    {
        $ins = new static;

        $client = new Client(['base_uri' => config('analytics.base_url')]);

        try {

            $response = $client->get('total-hits', [
                'headers' => [
                    'X-API-KEY' => config('analytics.X-API-KEY'),
                    'X-API-SECRET' => config('analytics.X-API-SECRET')
                ],
                'query' => [
                    'hit_contents' => 'api_key'
                ]
            ]);

        } catch(\Exception $e) {

            return false;

        }

        if ($response->getStatusCode() != 200) {
            return false;
        }

        $result = json_decode($response->getBody()->getContents(), true);

        $result_apps = $result['api_key']['data'];

        usort($result_apps, function($a, $b){
            return $b['hit'] - $a['hit'];
        });

        return array_map(function($app) use($ins){

            $info = $ins->where('key', $app['info'])->first(['_id','name', 'key']);

            $app['id'] = $info->id;

            $app['name'] = $info->name;

            $app['key'] = $info->key;

            unset($app['info']);

            return $app;

        }, array_slice($result_apps, 0, $count));

    }

    public function scopeOwnBy($query, $user)
    {
        $userId = ($user instanceof User) ? $user->id : $user;

        return $query->where('user_id', '=', $userId);
    }

    public function makeDisable()
    {
        $this->disable = true;

        return $this->save();
    }

    public function makeEnable()
    {
        return $this->drop('disable');
    }
}