@extends('layouts.app')

@section('content')

    <h1>CREATE FORM</h1>

    <form action="/posts" method="post">
        <input type="text" name="title" placeholder="Title" required>
        {{csrf_field()}}
        <input type="submit" name"submit">

    </form>
@endsection

@section('footer')
    
@endsection