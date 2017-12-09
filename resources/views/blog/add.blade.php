@extends('layouts.app')

@section('content')
    @include('errors._form_errors')

        {{Form::open()}}
            @include('blog._form', ['btnText'=>'Создать'])
        {{Form::close()}}
    @include('uploadFile._uploadFile')


@endsection

@section('title', 'Добавить запсиь в блог')
