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
            Article::create($request->all());
        return redirect()->route('blog.index');
    }

    public function index()
    {
        $articles=Article::orderBy('updated_at', 'DESC')
            ->paginate(static::PER_PAGE);

        return view('blog.index', ['articles'=>$articles]);
    }

    public function show(Article $article)
    {
        return view('blog.show', ['article'=>$article]);
    }

    public function edit(Article $article)
    {
        return view('blog.edit', [
            'article' => $article
        ]);
    }

    public function update(Article $article, Request $request)
    {
        $article->update($request->all());
        return redirect()->route('blog.index');
    }

    public function delete(Article $article)
    {
        $article->delete();
        return view('blog.show', ['article'=>$article]);
    }
}
