<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
/**
 * @var strind
 */

protected $table = "articles";

    /**
     * @var array
     */

    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    /**
     * @var array
     */

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function images (){
        return $this->hasMany('App\Image');
    }

}
