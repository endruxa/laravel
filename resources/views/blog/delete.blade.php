@extends('layouts.app)

@section('content')
    <button type="submit" class="btn btn-danger">
        DELETE
    </button>
    {{method_field('DELETE')}}
    {{csrf_field()}}

@endsection