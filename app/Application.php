<?php

namespace App;

use App\User;
use Jenssegers\Mongodb\Model;
use Auth;

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