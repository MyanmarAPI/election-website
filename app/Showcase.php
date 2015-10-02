<?php

namespace App;

use Jenssegers\Mongodb\Model;

/**
 * Showcase Application Model.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Showcase extends Model
{
	/**
     * The database collection used by the model.
     *
     * @var string
     */
    protected $collection = 'showcase';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'slug', 
        'description', 
        'store_url', 
        'website_url', 
        'type', 
        'icon', 
        'screenshots', 
        'published',
        'approved',
        'user_id'
    ];

     /**
     * Relationship for user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeOwnBy($query, $user)
    {
        $userId = ($user instanceof User) ? $user->id : $user;

        return $query->where('user_id', '=', $userId);
    }

    public function setSlugAttribute($value)
    {
        $ins = new static;

        if ( $ins->where('slug', $value)->count() > 0) {
            $value = $value . '-' . time();
        }

        $this->attributes['slug'] = $value;
    }

    /**
     * Check showcase is ready to publish.
     *
     * @return boolean
     */
    public function readyToPublish()
    {
        if ( count($this->screenshots) > 1 && ! is_null($this->icon)) {
            return true;
        }

        return false;
    }

    /**
     * Check showcase is already published.
     *
     * @return boolean
     */
    public function alreadyPublished()
    {
        if ( $this->published == 'p' && $this->activated == true) {
            return true;
        }
        
        return false;
    }
}