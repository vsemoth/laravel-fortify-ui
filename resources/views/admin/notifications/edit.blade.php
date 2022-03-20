@extends('layouts.app')

@section('htmlheader_title', 'Edit notification')

@section('content')

	 @section('contentheader_title')
	 	<h1>Edit notification</h1>
	 @endsection

    {!! Form::open(['action' => ['NotificationController@update', $notification->id], 'method' => 'notification', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('notification_title', 'Title') }}
        {{ Form::text('notification_title', $notification->notification_title, ['class' => 'form-control bg-dark text-color' .($errors->has('notification_title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}

        @if ($errors->has('notification_title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('notification_title') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('notification_content', 'Body') }}
        {{ Form::textarea('notification_content', $notification->notification_content, ['id' => 'article-ckeditor', 'class' => 'form-control bg-dark text-color' .($errors->has('notification_content') ? ' is-invalid' : ''), 'placeholder' => 'Type here...']) }}

        @if ($errors->has('notification_content'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('notification_content') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <!-- <div class="form-group">
        {{-- {{ Form::file('cover_image') }} --}}
    </div> -->
    <hr>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Update notification', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

@endsection