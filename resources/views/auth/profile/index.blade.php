@extends('layouts.app')

@section('title', Auth::user()->name . "'s Profile")

@section('main-content')

	@if(strpos(Auth::user()->email, 'ski.co.za'))
    	{{ header("Location: manage") }}
    @endif

	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2">
					<h1>User Profile</h1>
					<hr>
					<h2>My Orders</h2>
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
						<div class="panel-footer">Total Price: R{{ $order->cart->totalPrice }} </div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
<!-- ///////////////////////////////////////////////////////////////////// -->
@endsection