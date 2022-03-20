@extends('layouts.app')

@section('htmlheader_title', 'Create New Notification')

@section('main-content')

	 @section('contentheader_title')
	 	<h1>New Notification</h1>
	 @endsection

    <hr>
    {!! Form::open(['action' => 'NotificationController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('notification_title', 'Title') }}
        {{ Form::text('notification_title', null, ['class' => 'form-control bg-dark' .($errors->has('notification_title') ? ' is-invalid' : ''), 'placeholder' => 'Title', 'value' => "old('email')"]) }}

        @if ($errors->has('notification_title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('notification_title') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('notification_content', 'Body') }}
        {{ Form::textarea('notification_content', null, ['id' => 'article-ckeditor', 'class' => 'form-control bg-dark' .($errors->has('notification_content') ? ' is-invalid' : ''), 'placeholder' => 'Type here...']) }}

        @if ($errors->has('notification_content'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('notification_content') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {{ Form::file('cover_image') }}
    </div>
    <hr>
        {{ Form::submit('Create Post', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

@endsection