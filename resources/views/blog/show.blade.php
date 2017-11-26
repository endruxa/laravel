@extends('layouts.app')

@section('content')

    <h2>{{ $article->title }}</h2>

    <div>{{ $article->description }}</div>

@endsection




<div class="row">
    <div class="col-md-4">
        <h2>Heading</h2>
        <p>Dmassa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
</div>
<hr>