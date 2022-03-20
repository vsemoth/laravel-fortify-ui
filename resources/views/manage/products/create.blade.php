@extends('layouts.app')

@section('htmlheader_title', 'Add New Product')

@section('main-content')

    <div class = "container">
        @section('contentheader_title')
         <h2>Add Product</h2>
        @endsection
    <hr>
    {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'files' => true]) !!}
    <div class="form-group">
        {{ Form::label('item', 'Category') }}
        {{ Form::text('item', null, ['class' => 'form-control bg-dark text-color' .($errors->has('item') ? ' is-invalid' : ''), 'placeholder' => 'Category']) }}

        @if ($errors->has('item'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('item') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('brand', 'Brand') }}
        {{ Form::text('brand', null, ['id' => 'article-ckeditor', 'class' => 'form-control bg-dark text-color' .($errors->has('brand') ? ' is-invalid' : ''), 'placeholder' => 'Brand']) }}

        @if ($errors->has('brand'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('brand') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('style', 'Style') }}
        {{ Form::text('style', null, ['id' => 'article-ckeditor', 'class' => 'form-control bg-dark text-color' .($errors->has('style') ? ' is-invalid' : ''), 'placeholder' => 'Style']) }}

        @if ($errors->has('style'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('style') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('color', 'Colour') }}
        {{ Form::text('color', null, ['id' => 'article-ckeditor', 'class' => 'form-control bg-dark text-color' .($errors->has('color') ? ' is-invalid' : ''), 'placeholder' => 'Colour']) }}

        @if ($errors->has('color'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('color') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('size', 'Size') }}
        {{ Form::text('size', null, ['id' => 'article-ckeditor', 'class' => 'form-control bg-dark text-color' .($errors->has('size') ? ' is-invalid' : ''), 'placeholder' => 'Size']) }}

        @if ($errors->has('size'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('size') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price', null, ['id' => 'article-ckeditor', 'class' => 'form-control bg-dark text-color' .($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}

        @if ($errors->has('price'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
    <br>
    <div class="form-group">
        {!! Form::file('product_image', null, ['id' => 'product_image']) !!}
    </div>
    <hr>
        {{ Form::submit('Add product', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
      
   </div>

@endsection