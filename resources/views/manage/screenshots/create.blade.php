@extends('layouts.app')

@section('htmlheader_title', 'Create New Post')

@section('main-content')
    <h2>Upload Your Screenshot</h2>
    <hr>
    {!! Form::open(['action' => 'ScreenshotController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {{ Form::file('cover_image') }}
    </div>

    <br>

    {{ Form::label('category_id', 'Category:') }}

	    <select name="category_id" class="form-control">

    @foreach($categories as $category)
	    	<option value="{{ $category->id }}">{{ $category->category_name }}</option>
    @endforeach

	    </select>

    <hr>

        {{ Form::submit('Upload Screenshot', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}
@endsection