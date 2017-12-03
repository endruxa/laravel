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

    public static function tagList()
    {
        return static::pluck('title', 'id')->toArray();
    }

    public static function share()
    {
        \View::composer('blog._form', function($view){
            $view->with('tagList', static::tagList());
        });
    }

}
