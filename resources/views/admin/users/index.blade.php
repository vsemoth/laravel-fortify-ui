@extends('layouts.app')

@section('htmlheader_title', 'Manage Users')

@section('content')

	<div class="card border-0">
		<div class="card card-title bg-dark">
			<h1 class="title" style="color: #555;">
				Manage Users <a class="btn btn-default bg-light" style="float: right;" href="{{ route('users.create') }}">Create New User</a>
			</h1>
		</div>
		<div class="card card-body bg-dark">
			<table class="table" style="color: #555;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Date Created</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<th>{{ $user->id }}</th>
						<td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
						<td>{{ $user->created_at }}</td>
						<td>{{ $user->email }}</td>
						<td><a class="btn btn-warning btn-sm" href="{{ route('users.edit',$user->id) }}">EDIT</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{{ $users->links() }}
	</div>

@endsection