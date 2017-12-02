<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['slug', 'name'];


    public function setSlugAttribute ()
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
        return $this;
    }

    public function getSlugRouteName ()
    {
        return 'slug';
    }



}
