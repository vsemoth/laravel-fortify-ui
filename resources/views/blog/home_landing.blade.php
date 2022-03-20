<?php 
    if($_SERVER['HTTP_HOST'] == "http://www.ski.co.za" || $_SERVER['HTTP_HOST'] == "http://ski.co.za") {
        header('Location: https://ski.co.za');
    } elseif($_SERVER['HTTP_HOST'] == "https://www.kidsfunparties.co.za" || $_SERVER['HTTP_HOST'] == "https://kidsfunparties.co.za") {
        header('Location: https://ski.co.za/kidsparties');
    }
?>
@extends('layouts.app')

@section('htmlheader_title', $post['post_title'])

@section('content')
	<div class="row">
		<div class="container">
			<!-- {{-- <img src="storage/images/cover_images/{{ $post['cover_image'] }}" alt="{{ $post['post_title'] }} image"> --}} -->
			<div class="card">
    			<!-- {{-- <div class="card card-header">
    				<h1>{{ $post["post_title"] }}</h1>					
    			</div> --}} -->
				<div class="card card-body">
					<p>{!! $post["post_content"] !!}</p>					
				</div>
			</div>
			
		</div>
	</div>
@endsection