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
						<th>Status</th>
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
						<td>{{ $user->admin }}</td>
						<td><a class="btn btn-warning btn-sm" href="{{ route('users.edit',$user->id) }}">EDIT</a></td>
						@if($user->admin != 1)	
						<td>
			<form action="{{ route('users.update',$user->id) }}" method="POST">
				{{ method_field('PATCH') }}
				{{ csrf_field() }}
				<input type="hidden" name="assign" value="1">
				<input type="submit" class="btn btn-success btn-sm" value="Assign Admin">
			</form>
						</td>
						@else
						<td>	
			<form action="{{ route('users.update',$user->id) }}" method="POST">
				{{ method_field('PATCH') }}
				{{ csrf_field() }}
				<input type="hidden" name="assign" value="null">
				<input type="submit" class="btn btn-danger btn-sm" value="Remove Admin">
			</form>
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{{ $users->links() }}
	</div>

@endsection