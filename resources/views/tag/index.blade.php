@extends('layouts.app')

@section('content')

    <h1>{{$tag->title}}</h1>
    @include('blog._blog', ['articles'=>$tag->articles])

@endsection