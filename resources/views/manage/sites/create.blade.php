@extends('layouts.app')

@section('htmlheader_title', 'Register New Site')

@section('content')
    <h2>Register Your Site</h2>
    <hr>
    {!! Form::open(['action' => 'App\Http\Controllers\SiteController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Title') }}
        {{ Form::text('Site Name', null, ['id' => 'ski-text', 'class' => 'form-control bg-dark' .($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Title', 'value' => "old('email')"]) }}

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('name', 'Body') }}
        {{ Form::textarea('name', null, ['id' => 'article-ckeditor', 'class' => 'form-control bg-dark' .($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Type here...']) }}

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <br>

    <!-- {{-- Form::label('category_id', 'Category:') --}} -->

        <select name="category_id" class="form-control">
{{--
    @foreach($categories as $category)
            <!-- <option value="{{ $category->id }}">{{ $category->category_name }}</option> -->
    @endforeach
--}}
        </select>
    <br>
    <hr>
        {{ Form::submit('Register Site', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection