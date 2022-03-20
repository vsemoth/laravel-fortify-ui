@extends('layouts.app')

@section('htmlheader_title', 'Manage Users')

@section('content')

	<div class="card border-0">
		<div class="card card-title bg-dark">
			<h1 class="title" style="color: #555; text-align: center;">
				Create New User
			</h1>
		</div>
		<div class="card card-body card-bare bg-dark" style="color: #555;">
			<form action="{{ route('users.store') }}" method="POST">
				<div class="form-group">
					<label for="name">Name:</label>
					<p>
						<input class="form-control" type="text" name="name" id="name" placeholder="Full Name...">
					</p>
				</div>
				
				<div class="form-group">
					<label for="email">Email:</label>
					<p>
						<input class="form-control" type="text" name="email" id="email" placeholder="Email Address">
					</p>
				</div>
				
				<div class="form-group">
					<label for="password">Password:</label>
					<p>
						<input class="form-control" type="password" name="password" id="password" :v-if="!auto_password" placeholder="Manually assign this user a password">
					</p>
				</div>
						  <div class="form-check">
						    <input type="checkbox" name="auto_generate" class="form-check-input" v-model="auto_password">
						    <label class="form-check-label" for="auto_generate">Auto Generate Password</label>
						  </div>
				<hr>
				<input type="submit" class="btn btn-success btn-block is-outlined" value="Create User">

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