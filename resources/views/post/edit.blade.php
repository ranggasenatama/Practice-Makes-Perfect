@extends('layouts.app')

@section('content')

    <h1>EDIT FORM</h1>

    <form action="/posts.edit" method="post">
        <input type="text" name="title" placeholder="Title" required>
        {{csrf_field()}}
        <input type="submit" name"submit">

    </form>
@endsection

@section('footer')
    
@endsection