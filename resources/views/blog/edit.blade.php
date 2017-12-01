@extends('layouts.app')

@section('content')
    {{ Form::model($article, ['route' => ['blog.update', 'slug' => $article->slug], 'method' => 'post']) }}
    @include('blog._form', ['btnText' => 'Редактировать'])
    {{ Form::close() }}
@endsection
        {{csrf_field()}}
@section('title', 'Редактирование записи ' . $article->title)