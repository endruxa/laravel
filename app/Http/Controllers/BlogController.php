<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\BlogRequestController;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    const PER_PAGE = 15;

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function add()
    {
     return view('blog.store');
    }

    public function store(BlogRequestController $request)
    {
            //Article::create($request->all());
        $tagsIds = $request->get('tagId');
        try {
            DB::beginTransaction();
            $article = $request
                ->user()
                ->articles()
                ->create($request->all());

            $article->tag()->attach($tagsIds);
            DB::commit();
        }catch (\Exception $e)
        {
            DB::rollBack();
        }
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

    public function update(Article $article, BlogRequestController $request)
    {
        try {
            DB::beginTransaction();
            $tagsId = $request->get('tagId');
            $article->update($request->all());

            $article->tag()->sync($tagsId);

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }
        return redirect()->route('blog.index');
    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect()->route('blog.show');
    }
}
