<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pivot extends Model
{
    protected $fillable = ['articles_slug', 'tags_slug'];

    public function article ()
    {
       return $this->belongsToMany(Article::class);
    }

    public function tag ()
    {
        return $this->belongsToMany(Tag::class);
    }
}
