@extends('layouts.app')

@section('content')

    <form action="{{route('blog.store')}}">
        <div class="form-group">
            <label for="title">Fresh News</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Fresh News">
        </div>
        <div class="form-group">
            <label for="description">Content</label>
            <textarea  name="description" class="form-control" id="description" rows="3"></textarea>
        </div>

        {{csrf_field()}}

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @endsection

@section('title', 'News blog')
