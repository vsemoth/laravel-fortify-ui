@extends('layouts.app')

@section('htmlheader_title', "kids parties | kids parties ferndale | kids parties randburg | kids parties johannesburg | kids ski parties | bumboarding parties | tubing parties | ".$post['post_title'])

@section('tags')

    <p>kids parties | kids parties ferndale | kids parties randburg | kids parties johannesburg | kids ski parties | bumboarding parties | tubing parties</p>

@endsection

@section('main-content')
	<div class="row">
		<div class="container">
			<div class="card">
				<div class="card card-body">
					<p style='background-color: #999; color: #000;'>{!! $post["post_content"] !!}</p>
				</div>
			</div>
			
		</div>
	</div>
@endsection