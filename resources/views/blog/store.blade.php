@extends('layouts.app')

@section('content')
        {{Form::open()}}

            @include('blog._form', ['btnText'=>'Создать'])

        {{Form::close()}}

@endsection
@section('title', 'Добавить запсиь в блог')
