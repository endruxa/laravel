@extends('layouts.app')
@section('content')

    {{Form::open()}}
    echo Form::label('title', ['class'=>'form-control', 'id'=>'title']);
    echo Form::text('description', ['class'=>'form-control', 'rows'=>3]);
    echo Form::token;

    {{Form::close()}}

@endsection
