<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@include('parts.navbar')
<div class="jumbotron">
    <div class="container">
        <h1>Hello, world!</h1>
        <p>Welcome</p>
        <p><a class="btn btn-primary btn-lg" href="{{route('blog.index')}}" role="button">News &raquo;</a></p>
    </div>
</div>
<div class="container">
@yield('content')
</div>

@yield('ad')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
@yield('footer.js')
</body>
</html>
