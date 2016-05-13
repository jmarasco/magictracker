<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the checks for the user.
     */
    public function checks() {
        return $this->hasMany(Check::class);
    }

    /**
     * Get all of the comments for the user.
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all of the items the user has checked.
     */
    public function items() {
        return $this->hasManyThrough(Item::class, Check::class);
    }


}
