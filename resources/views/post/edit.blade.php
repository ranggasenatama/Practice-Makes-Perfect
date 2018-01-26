@extends('layouts.app')

@section('content')

    <h1>EDIT FORM</h1>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    @endif

    {!! Form::open(['method'=>'PUT','action'=>['PostController@update',$post->id]]) !!}
    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('content','Content') !!}
        {!! Form::textarea('content',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    <br>
    
    {!! Form::open(['method'=>'DELETE','action'=>['PostController@destroy',$post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
    </div>
    {!! Form::close() !!}

@endsection

@section('footer')
    
@endsection