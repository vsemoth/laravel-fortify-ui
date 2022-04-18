@extends('layouts.app')

@section('htmlheader_title', 'Edit Site Details')

@include('layouts.partials.tinymce')

@section('content')

    <div class = "container">
        <div class="col-md-12">
                <h2>Edit Site Details</h2>
                <hr>
                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $site->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
               <hr>
                <div class="form-group">
                    {{ Form::label('name', 'Title') }}
                    {{ Form::text('name', $site->name, ['class' => 'form-control bg-dark text-color' .($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    {{ Form::label('domain', 'Body') }}
                    {{ Form::textarea('domain', $site->domain, ['id' => 'mytextarea', 'rows' => 55, 'cols' => 6, 'class' => 'form-control bg-dark text-color' .($errors->has('domain') ? ' is-invalid' : ''), 'placeholder' => 'Type here...']) }}
            
                    @if ($errors->has('domain'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('domain') }}</strong>
                        </span>
                    @endif
                </div>
            
                <br>
            
                {{ Form::label('niche_id', 'Niche:') }}
            
                  <select name="niche_id" class="form-control">
            
                @foreach($categories as $niche)
                    <option value="{{ $niche->id }}">{{ $niche->name }}</option>
                @endforeach
            
                  </select>
                <hr>
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::submit('Update Site', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
        </div>
      
   </div>

@endsection