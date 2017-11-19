@extends('layouts.app')

@section('content')
        {{form::open()}}

            @include('blog._form', ['btnText'=>'Создать'])

        {{form::close()}}

@endsection
@section('title', 'Добавить запсиь в блог')
