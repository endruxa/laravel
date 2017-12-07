<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App
 */

class Tag extends Model
{
    protected $fillable = ['title'];

    public $timestamps = false;

    /**
     * @param $value
     */
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

    public static function share()
    {
        \View::composer('blog._form', function ($view) {
            $view->with('tagList', static::tagList());
        });
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

}