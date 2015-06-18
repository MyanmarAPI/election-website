<?php

namespace App;

use Jenssegers\Mongodb\Model;

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
    protected $fillable = ['name', 'description', 'key'];

    /**
     * Relationship for user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	$this->belongsTo('App\User');
    }
}