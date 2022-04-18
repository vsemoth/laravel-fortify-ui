@extends('layouts.file')

@section('htmlheader_title', $post->post_title)

@section('content')
	<div class="row">
		<div class="container">
            @if(Session::has('success'))
            <div class="row" style="margin-top: 30px;">
                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                    <div id="charge_message" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
            @endif
				<div class="card card-body">
					<p style='background-color: #999; color: #000;'>{!! $post->post_content !!}</p>
				</div>
			</div>
			
		</div>
	</div>
@endsection