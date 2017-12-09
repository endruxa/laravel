@extends('layouts.app')

@section('content')
    {{dd($tag)}}
    <h1>{{ $tag->title }}</h1>
    @include('blog._blog', ['articles' => $tag->articles])
@endsection