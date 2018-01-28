<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;
    // protected $table = posts;
    // protected $primaryKey= posts_id;

    protected $dates = ['deleted_at'];

    protected $fillable=[

        'title',
        'content',
        'path'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function photos(){
        return $this->morphMany('App\Photo','imagable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public static function scopeLatest($query)
    {
        return $query->orderBy('id','desc')->get();
    }

}
