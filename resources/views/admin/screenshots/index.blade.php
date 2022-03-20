@extends('layouts.app')

@section('htmlheader_title', 'screenshot_image')

  @section('contentheader_title')

    <div class="card-header">
        <h1>All Screenshots</h1>
        <a href="{{ route('screenshots.create') }}" style="float: right;" class="btn btn-primary btn-sm">New</a>
    </div>

  @endsection

@section('content')

<div class="container" style="width: 100%; overflow: hidden;">

        @foreach($screenshots as $screenshot)

        @if(!empty($screenshots))

  <div class="card" align="center">

            {!! Form::open(['action' => ['ScreenshotController@destroy', $screenshot->id], 'method' => 'screenshot', 'enctype' => 'multipart/form-data']) !!}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::submit('DELETE', ['class' => 'btn btn-danger btn-sm']) }}
            {!! Form::close() !!}
      <div align="center" class="card-body">
          <div style="position: relative; display: block;">
          <div style="display: inline-flex; position: absolute; margin: 240px 400px;">

            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#basicExampleModal">
              Edit Image
            </a>
          </div>
            <a href="{{ route('blog.image',$screenshot->image_slug) }}">
             <img src='{{ asset("/storage/images/screenshots/$screenshot->cover_image") }}' alt="screenshot image">
            </a>
          </div>
          <hr>

      </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $screenshot->cover_image }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @include('manage.screenshots.edit')

        </div>
      </div>
    </div>
  </div>

        @endif

        @endforeach
</div>

<script>
	
$(function() {

  $('[data-toggle="modal"]').hover(function() {
    var modalId = $(this).data('target');
    $(modalId).modal('show');

  });

});

</script>

@endsection