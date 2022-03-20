@extends('layouts.app')

@section('title', config('app.name') . ' | Shipping Info')

@section('main-content')

	<div class="row" style="margin-bottom: 60px;">
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2">

					<h3>Shipping Info</h3>

					{!! Form::open(['route' => 'details.store', 'method' => 'post']) !!}

					<div class="form-group">
						{{ Form::label('addressline1', 'Address Line 1:') }}
						{{ Form::text('addressline1', 'addressline1', ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('addressline2', 'Address Line 2:') }}
						{{ Form::text('addressline2', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('city', 'City:') }}
						{{ Form::text('city', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('state', 'State / Province:') }}
						{{ Form::text('state', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('zip', 'Zip / Postal Code:') }}
						{{ Form::number('zip', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('country', 'Country:') }}
						{{ Form::text('country', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('phone', 'Phone number:') }}
						{{ Form::number('phone', null, ['class' => 'form-control']) }}
					</div>

					{{ Form::submit('Proceed to Send Order', ['class' => 'btn btn-success']) }}
					
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

@endsection