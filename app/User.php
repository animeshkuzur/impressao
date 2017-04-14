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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $register_validation_rules = [
        'name' => 'required',
        'email' => 'required|email|Unique:users',
        'password' => 'required|min:8',
        'password2' => 'required|min:8',
    ];

    public static $login_validation_rules = [
        'email' => 'required|exists:users',
        'password' => 'required',
    ];

    function socialAccounts(){
        return $this->hasMany(SocialAccount::class);
    }
}
