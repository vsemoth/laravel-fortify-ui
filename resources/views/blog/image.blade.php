@extends('layouts.app')

@section('htmlheader_title', $screenshot['screenshot_title'])

@section('main-content')
	<div class="row">
		<div class="container">
			<img src="ski-parties-johannesburg/public/storage/images/screenshots/{{ $screenshot->cover_image }}" alt="{{ $screenshot['screenshot_title'] }} image">
			<div class="card">
				<div class="card card-header">
					<h1>{{ $screenshot["cover_image"] }}</h1>					
				</div>
				<div class="card card-body">
					<p>{{ $screenshot["screenshot_content"] }}</p>					
				</div>
			</div>
			
		</div>
	</div>
@endsection