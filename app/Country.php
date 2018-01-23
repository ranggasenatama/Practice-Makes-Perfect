<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts(){

        //2 tabel
        return $this->hasManyThrough('App\Post','App\User','country_id','user_id'); //country_id refer to App\User

    }

    public function users(){

        return $this->hasMany('App\User');
    }
}
