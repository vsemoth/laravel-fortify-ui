@extends('layouts.admin')

@section('htmlheader_title', 'Create New Post')

@section('main-content')

    <div class = "container">
    <h2>Edit Post</h2>
    <hr>
    {!! Form::open(['action' => ['KidspartiesController@update', $kidsparty->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class = "dropdown row">
              <select name="drop" class="mdb-select md-form colorful-select dropdown-primary">
               @foreach ($kidsparties as $post1)
                @if ($kidsparty->id != $post1->id)
                  <option value="">-</option>
                  <option value="{{ $post1->id }}">{{ $post1->blog_title }}</option>
                @endif
               @endforeach
              </select>
      </div>
   <hr>
    <div class="form-group">
        {{ Form::label('blog_title', 'Title') }}
        {{ Form::text('blog_title', $kidsparty->blog_title, ['class' => 'form-control bg-dark text-color' .($errors->has('blog_title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}

        @if ($errors->has('blog_title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('blog_title') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('blog_content', 'Body') }}
        {{ Form::textarea('blog_content', $kidsparty->blog_content, ['id' => 'article-ckeditor', 'class' => 'form-control bg-dark text-color' .($errors->has('blog_content') ? ' is-invalid' : ''), 'placeholder' => 'Type here...']) }}

        @if ($errors->has('blog_content'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('blog_content') }}</strong>
            </span>
        @endif
    </div>

    <br>

    {{ Form::label('category_id', 'Category:') }}

      <select name="category_id" class="form-control">

    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
    @endforeach

      </select>
    <br>
    <div class="form-group">
        {{ Form::file('cover_image') }}
    </div>
    <hr>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Update Post', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
      
   </div>

@endsection