@extends('layouts.app')

@section('htmlheader_title', 'screenshot_image')

@section('main-content')

<div class="card" align="center">
	@section('contentheader_title')

    <div class="card-header">
        <h1><a href="#">{{ $screenshot['cover_image'] }}</a></h1>
    </div>

	@endsection

    <div align="center" class="card-body">

		@if(count($screenshot) > 0)

				<div style="position: relative;">
					<img src="img/$screenshot['cover_image']" alt="screenshot image">
				</div>

		@endif
    	
    </div>


@endsection