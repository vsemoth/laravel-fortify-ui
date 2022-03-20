@extends('layouts.app')

@section('htmlheader_title', 'Manage Users')

@section('content')

	<div class="card border-0">
		<div class="card card-title bg-dark">
			<h1 class="title" style="color: #555; text-align: center;">
				Edit User
			</h1>
		</div>
		<div class="card card-body card-bare bg-dark" style="color: #555;">
			<form action="{{ route('users.update',$user->id) }}" method="POST">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Name:</label>
					<p>
						<input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
					</p>
				</div>
				
				<div class="form-group">
					<label for="email">Email:</label>
					<p>
						<input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}">
					</p>
				</div>
				
				<div class="form-group">
					<label for="password">Password:</label>
						  <div class="form-radio">
						    <input type="radio" value="keep" class="form-radio-input" v-model="auto_password">
						    <label class="form-check-label" for="auto_generate">Do not change Password</label>
						  </div>

						  <div class="form-radio">
						    <input type="radio" value="auto" class="form-radio-input" v-model="auto_password">
						    <label class="form-check-label" for="auto_generate">Auto Generate New Password</label>
						  </div>

						  <div class="form-radio">
						    <input type="radio" value="manual" class="form-radio-input" v-model="auto_password">
						    <label class="form-check-label" for="auto_generate">Manually set new Password</label>
						  </div>
					<p>
						<input class="form-control" type="password" name="password" id="password" :v-if="!auto_password" placeholder="Manually assign this user a password">
					</p>
				</div>
				<hr>
				<input type="submit" class="btn btn-primary btn-block" value="Update User">

			</form>
		</div>
	</div>
@endsection

@section('scripts')

	<script>
		var app = new Vue({
			el: '#app',
			data: {
				auto_password: true
			}
		});
	</script>

@endsection