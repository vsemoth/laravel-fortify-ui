@extends('layouts.admin')

@section('htmlheader_title', 'Create New Post')

@section('content')
    <h2>Create Your Post</h2>
    <hr>
    @include('layouts.components.forms.tinymce-editor')
    <x-forms.tinymce-editor/>
@endsection