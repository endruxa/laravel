@extends('layouts.app')

@section('content')
    @foreach($result as $article)
        <section>
            <h2>
                <a href="{{route('blog.show', ['slug'=>$article->slug])}}">{{$article->title}}</a>
            </h2>
            <div>
                {{$article->description}}
            </div>
        </section>

    @endforeach

{{$result->render()}}

@endsection

@section('title', 'Blog')