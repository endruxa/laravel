<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    @section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('/css/app.css')}}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('/comments/css/comments.css')}}" />

    @show
</head>
<body>
@include('parts.navbar')
<div class="jumbotron">
    <div class="container">
        @if (session()->has('flash'))
           <h1>Hello, world!</h1>
           <p>Welcome</p>
            <div class="alert alert-{{ session('flash.type', 'danger') }}">{{ session('flash.message') }}</div>
        @endif
    </div>
</div>
<div class="container">
@yield('content')
@yield('comments')
</div>

@yield('ad')

    @section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
    {{--<script src="{{asset('/comments/jquery/jquery.min.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('/comments/js/comment-reply.js')}}"></script>
    <script type="text/javascript" src="{{asset('/comments/js/comment-scripts.js')}}"></script>
    @show
    @yield('footer.js')
</body>
</html>
