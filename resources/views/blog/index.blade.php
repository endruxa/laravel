@extends('layouts.app')

@section('content')
    @foreach($articles as $article)
        <section>
            <h2>
                <a href="{{ route('blog.show', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
            </h2>
            <div>{{ $article->description }}</div>
        </section>
    @endforeach

    {{ $articles->render() }}
@endsection

@section('title', 'Блог')