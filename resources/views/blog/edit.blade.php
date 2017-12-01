@extends('layouts.app')

@section('content')
    @include('errors._form_errors)
    {{ Form::model($article, ['route' => ['blog.update', 'slug' => $article->slug], 'method' => 'put']) }}
    @include('blog._form', ['btnText' => 'Редактировать'])
    {{ Form::close() }}
@endsection

@section('title', 'Редактирование записи ' . $article->title)