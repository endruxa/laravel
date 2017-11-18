<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['title', 'description', 'slug'];

    public function setAttributeSlug(Request $request)
    {
        $data = $request->except('_token');
        $data = array_merge($data,[
            'slug'=> str_slug($request->get('title'))
        ]);
    }
}
