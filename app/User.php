<?php

namespace App;

use App\Util\Gravatar;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Jenssegers\Mongodb\Model;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database collection used by the model.
     *
     * @var string
     */
    protected $collection = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'status', 'role'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Relationship for application model
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function applications()
    {
        return $this->hasMany('App\Application');
    }

    /**
     * Check user is admin or not.
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Get user profile image (gravatar).
     *
     * @param  integer $size
     * @return sring
     */
    public function getProfileImage($size = 50)
    {
        return (new Gravatar($this->email))->url($size);
    }

    /**
     * Get admin member lists with pagination.
     *
     * @param  integer $perPage
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAdminWithPaginate($perPage = 20)
    {
        $instance = new static;

        return $instance->where('role', '=', 'admin')->latest()->paginate($perPage);
    }

    /**
     * Get user lists with pagination.
     *
     * @param  integer $perPage
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getUserWithPaginate($perPage = 20)
    {
        $instance = new static;

        return $instance->where('role', '=', 'user')->latest()->paginate($perPage);
    }
}
