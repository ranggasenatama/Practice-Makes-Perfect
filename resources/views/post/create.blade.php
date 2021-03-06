@extends('layouts.app')

@section('content')
    {{--  <form action="/posts" method="post">  --}}
        {{--  <input type="text" name="title" placeholder="Title" required>
        {{csrf_field()}}
        <input type="submit" name"submit">  --}}

    <h1>CREATE FORM</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['method'=>'POST','action'=>'PostController@store', 'files'=>true]) !!}

    <div class="form-group">

        {!! Form::label('title','Title',['class'=>'kelas anu']) !!}
        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Title']) !!}

    </div>
    <div class="form-group">

        {!! Form::label('content','Content',['class'=>'kelas anu']) !!}
        {!! Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Isi Post']) !!}
    
    </div>
    <div class="form-group">

        {!! Form::label('file','File',['class'=>'kelas anu']) !!}
        {!! Form::file('file') !!}
    
    </div>
    <div class="form-group">

        {!! Form::submit('Save',['class'=>'btn btn-danger']) !!}

    </div>

    {!! Form::close() !!}

@endsection

@section('footer')
    
@endsection