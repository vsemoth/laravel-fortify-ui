@extends('layouts.app')

@section('htmlheader_title', "$user->name's profile")

@section('content')

	<div class="card border-0">
		<div class="card card-title bg-dark">
			<h1 class="title" style="color: #555;">
				{{ $user->name }} <a class="btn btn-default bg-light" style="float: right;" href="{{ route('users.edit',$user->id) }}">Edit User</a>
			</h1>
		</div>
		<hr>
		<div class="card card-body bg-dark" style="color: #555;">
			<h4 class="bg-dark" style="color: #555; padding: 5px;">User Details:</h4>
		
				<label for="name">Name:</label>
				<pre style="color: #555;">{{ $user->name }}</pre>
			
		
				<label for="name">Email:</label>
				<pre style="color: #555;">{{ $user->email }}</pre>				
			
		</div>
	</div>

@endsection