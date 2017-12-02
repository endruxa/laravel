@extends('layouts.app')

@section('content')
        {{csrf_field()}}
    @foreach($articles as $article)
        <section>
            <h2>
                <a href="{{ route('blog.show', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
            </h2>
            <div>{{ $article->description }}</div>
            <div class="tag-list">
                @foreach($article->tags as $tag)
                    <span class="label{{getLabelClass()}}">{{$tag->title}}</span>
                @endforeach
            </div>
        </section>
    @endforeach

    {{ $articles->render() }}
@endsection

@section('title', 'Блог')