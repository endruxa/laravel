<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\BlogRequestController;
use Illuminate\Http\Request;
use DB;
use League\Flysystem\Exception;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')
            ->except(['index', 'show']
            );
    }

    public function add()
    {
     return view('blog.add');
    }

    public function store(BlogRequestController $request)
    {
        $tagsIds = $request->get('tag_id');
        try {
            DB::beginTransaction();
           $article = $request
                ->user()
                ->articles()
                ->create($request->all());
            $article->tags()->attach($tagsIds);

            DB::commit();
            flash()->success('Новость добавлена');

        }catch (\Exception $e) {

            DB::rollBack();
            flash()->danger('Новость не добавлена');
        }

        return redirect()->route('blog.index');
    }


    public function index()
    {
        $articles = Article::with('tags')
            ->orderBy('updated_at', 'DESC')
            ->paginate(Article::PER_PAGE);

        return view('blog.index',
            ['articles' => $articles]
        );
    }


    public function show(Article $article)
    {
        return view('blog.show',
            ['article' => $article]
        );
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
            $tagsIds = $request->get('tag_id');
            $article->update($request->all());

            $article->tags()->sync($tagsIds);
            DB::commit();

            flash()->success('Новость добавлена');

        }catch (\Exception $e){
            flash()->danger('Новость не удалось добавить');

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
