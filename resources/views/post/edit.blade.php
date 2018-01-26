@extends('layouts.app')

@section('content')

    <h1>EDIT FORM</h1>

    <form action="/posts/{{$post->id}}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" placeholder="Title" required value="{{$post->title}}">
        {{csrf_field()}}
        <input type="submit" name"submit" value="EDIT">

    </form>
    <br>
    <form action="/posts/{{$post->id}}" method="post">
        <input type="hidden" name="_method" value="DELETE">
        {{csrf_field()}}
        <input type="submit" name="submit" value="DELETE">

    </form>
@endsection

@section('footer')
    
@endsection