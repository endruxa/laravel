<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title'];

    public $timestamps = false;

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    /**
     * @return mixed
     */

    public static function tagList()
    {
        return static::pluck('title', 'id')->toArray();
    }

    /**
     *
     *
     */

    public static function share()
    {
        \View::composer('blog._form', function($view){
            $view->with('tagList', static::tagList() );
        });
    }

    public  function articles()
    {
        $this->belongsToMany(Article::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
