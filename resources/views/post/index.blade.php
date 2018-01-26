@extends('layouts.app')

@section('content')

    <ul>
        @foreach ($posts as $post)
            <a href="{{route('posts.show',$post->id)}}"><li>{{$post->title}}</li></a>
        @endforeach
    </ul>

@endsection

@section('footer')
    
@endsection