@extends('layouts.app')

@section('content')

   <a href="{{route('posts.edit',$post->id)}}"><h3>{{$post->title}}</h3></a>

@endsection

@section('footer')
    
@endsection