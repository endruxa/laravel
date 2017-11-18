<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    const PER_PAGE = 15;

    public function add()
    {
     return view('blog.store');
    }

    public function store(Request $request)
    {
            $data = $request->except('_token');
            $data = array_merge($data,
                [
                    'slug' => str_slug($request->get('title'))
                ]);
            Article::create($data);
        return redirect()->route('blog.index');
    }

    public function index()
    {
        $articles=Article::orderBy('updated_at', 'DESC')
            ->paginate(static::PER_PAGE);

        return view('blog.index', ['articles'=>$articles]);
    }

    public function show($slug)
    {
        $article=Article::where('slug', $slug)
            ->first();
        return view('blog.index', ['article'=>$article]);
    }
}
