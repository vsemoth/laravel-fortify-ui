@extends('layouts.admin')

@section('htmlheader_title', 'All Categories')

@section('main-content')

<div class="card" align="center">
	@section('contentheader_title')

		<div class="row">
			<div class="col-md-8">

			    <div class="card-header">
			        Category List
			    </div>

			    <table class="table">
			    	<thead>
			    		<tr>
				    		<th>
				    			#
				    		</th>
				    		<th>
				    			Name
				    		</th>  			
			    		</tr>
			    	</thead>
			    	<tbody>
			    		@foreach ($categories as $category)
			    		<tr>
			    			<td>
			    				{{ $category->id }}
			    			</td>
			    			<td>
			    				<h4><a href="{{ ('*') }}">{{ $category->category_name }}</a></h4>
			    			</td>
			    		</tr>
			    		@endforeach
			    	</tbody>
			    </table>

			</div><!-- end of col-md-8 -->

			<div class="col-md-3">
				<div class="card">
					<div class="card card-body bg-light">

						{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

							<h2>New Category</h2>
							<hr>
							{{ Form::label('category_name', 'Name:') }}
							<br>
							{{ Form::text('category_name',null, ['class' => 'form-control']) }}

							<hr>

							{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block']) }}

						{!! Form::close() !!}
						
					</div>
				</div>
			</div>
		</div>

	@endsection

@endsection

