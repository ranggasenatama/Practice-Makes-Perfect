@extends('layouts.app')

@section('content')

    <h1>EDIT FORM</h1>

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
        {!! Form::submit('Update',['class'=>'btn']) !!}
    </div>
    {!! Form::close() !!}

    <br>
    
    {!! Form::open(['method'=>'DELETE','action'=>['PostController@destroy',$post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete',['class'=>'btn'])!!}
    </div>
    {!! Form::close() !!}

@endsection

@section('footer')
    
@endsection