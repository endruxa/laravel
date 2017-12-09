@extends('layouts.app')

@section('content')
    @include('errors._form_errors')
    {{ Form::open(['files' => true]) }}
    @include('blog._form', ['btnText' => 'Создать'])
    {{ Form::close() }}
@endsection

@section('title', 'Добавить запись в блог')