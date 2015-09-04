<?php

namespace App;

use App\User;
use Jenssegers\Mongodb\Model;

/**
 * API User Token for Application Model.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Token extends Model
{
	/**
     * The database collection used by the model.
     *
     * @var string
     */
    protected $collection = 'tokens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['app_key', 'app_id', 'token', 'user_id', 'disable'];

    /**
     * Relationship for application model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application()
    {
    	return $this->belongsTo('App\Application', 'app_id');
    }

    /**
     * Get Unique User by Api Key
     *
     * @return void
     * @author 
     **/
    public function getTokenCountByApp($app_key)
    {

        $model = $this->getModel();

        return $model->where('app_key', $app_key)->count();

    }

    /**
     * Get Token Counts by App
     *
     * @return void
     * @author 
     **/
    public static function getAppTokenCounts()
    {
        $ins = new static;

        $result = $ins->raw(function($collection){
            return $collection->aggregate([
                '$group' => [
                    '_id' => '$app_key',
                    'users' => ['$sum' => 1]
                ]
            ]);
        });

        usort($result['result'], function($a, $b){
            return $b['users'] - $a['users'];
        });

        return $result['result'];
    }

}