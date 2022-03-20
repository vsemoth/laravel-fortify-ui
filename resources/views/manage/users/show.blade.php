@extends('layouts.app')

@section('htmlheader_title', "$user->name's profile")

@section('content')

	<div class="card border-0">
		<div class="card card-title bg-dark">
			<h1 class="title" style="color: #555;">
				{{ $user->name }}'s Profile <a class="btn btn-default bg-light" style="float: right;" href="{{ route('users.edit',$user->id) }}">Edit User</a>
			</h1>
		</div>
		<hr>
		<div class="card card-body bg-dark" style="color: #555;">
			<h4 class="bg-dark" style="color: #555; padding: 5px;">User Details:</h4>
		
				<label for="name">Name:</label>
				<pre style="color: #555;">{{ $user->name }}</pre>
			
		
				<label for="name">Email:</label>
				<pre style="color: #555;">{{ $user->email }}</pre>

					<hr>
					<h2>{{ $user->name }}'s Orders</h2>
					@foreach($orders as $order)
					<div class="panel panel-default">
						<div class="panel-body">
							<ul class="list-group">
								@foreach($order->cart->items as $item)
									<li class="list-group-item">
										<span class="badge">R{{ $item['price'] }}</span>
										{{ $item['item']['item'] }} | {{ $item['qty'] }} Units
									</li>
								@endforeach
							</ul>
						</div>
						<span>Order Date: {{ $order->created_at }}</span>
						<div class="panel-footer">Total Price: R{{ $order->cart->totalPrice }} </div>
					</div>
					@endforeach
			
		</div>
	</div>

@endsection