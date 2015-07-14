<?php

namespace App;

use Jenssegers\Mongodb\Model;

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
    protected $fillable = ['name', 'slug', 'description', 'url', 'type', 'icon', 'screenshots', 'published'];

    public function setSlugAttribute($value)
    {
        $ins = new static;

        if ( $ins->where('slug', $value)->count() > 0) {
            $value = $value . '-' . time();
        }

        $this->attributes['slug'] = $value;
    }

    /**
     * Mutator for screenshots attributes.
     *
     * @param array $values
     */
    public function setScreenshotsAttribute($values)
    {
        $this->attributes['screenshots'] = array_filter($values);
    }
}