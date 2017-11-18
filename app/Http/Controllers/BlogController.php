<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    const PER_PAGE = 15;

    public function add()
    {
     return view('blog.store');
    }

    public function store(Request $data)
    {
        if ($data->isMethod('post')) {
            $request = $data->except('_token');
            $request = array_merge($request,
                [
                    'slug' => str_slug($data->get('title')),
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ]);

            DB::table('articles')->insert($request);
        }
        return redirect()->route('blog.index');
    }

    public function index()
    {
        $result=DB::table('articles')
            ->orderBy('updated_at', 'DESC')
            ->paginate(static::PER_PAGE);

        return view('blog.index', ['result'=>$result]);
    }

    public function show($slug)
    {
        $result=DB::table('articles')
            ->where('slug', $slug)
            ->first();
        return view('blog.index', ['result'=>$result]);
    }
}
