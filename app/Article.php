<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Article extends Model
{
    protected $fillable=['title', 'description', 'slug'];

    public function getSlugAttribute(Request $request)
    {
        $article = new Article();

        $article->slug = $request->title;

        $article->save();
    }

}
