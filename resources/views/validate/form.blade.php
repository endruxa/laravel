@extends('layouts.app')

@section('content')

    <form action="" method="post">
        {{{csrf_field()}}}
        <input type="text" name="name"><br>
        @if($errors->has('name'))
            <div class="alert alert-danger">{{$errors->first('name')}}</div>
        @endif
        <input type="text" name="age"><br>
        @if($errors->has('age'))
            <div class="alert alert-danger">{{$errors->first('age')}}</div>
        @endif
        <button>Validate</button>
    </form>

@endsection