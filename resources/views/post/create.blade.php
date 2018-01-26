@extends('layouts.app')

@section('content')
    <form action="/posts" method="post">
        <input type="text" name="title" placeholder="Title">
        {{csrf_field()}}
        <input type="submit" name"submit">

    </form>
@endsection

@section('footer')
    
@endsection