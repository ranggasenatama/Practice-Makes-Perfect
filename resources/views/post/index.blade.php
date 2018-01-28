@extends('layouts.app')

@section('content')

    <ul>
        @foreach ($posts as $post)
            <img src="{{$post->path}}" alt="foto" height="100px" widht="100px">

            <a href="{{route('posts.show',$post->id)}}"><li>{{$post->title}}</li></a>
        @endforeach
    </ul>

@endsection

@section('footer')
    
@endsection