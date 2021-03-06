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


    public function post()
    {
        return $this->hasOne('App\Post','user_id');
        //return $this->hasMany('App\Post','user_id');
    }

    public function posts()
    {
        // return $this->hasOne('App\Post','user_id');
        return $this->hasMany('App\Post','user_id');
    }

    public function roles(){
        return $this->belongsToMany('App\Role','role_user','user_id','role_id');
    
    }

    public function photos(){
        return $this->morphMany('App\Photo','imagable');
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    //MIDDLEWARE
    public function role(){
    
        return $this->belongsTo('App\Role');
    
    }

    public function isAdmin()
    {
        if($this->role->name == 'admin')
        {
            return true;
        }

        return false;
    }
}
