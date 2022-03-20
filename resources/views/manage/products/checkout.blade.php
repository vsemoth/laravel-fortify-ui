@extends('layouts.app')

@section('title', config('app.name') . ' | Checkout')

@section('main-content')

    <div style="display: absolute; margin-top: 80px;" class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-2 col-sm-offset-1">
        	<h1>CHECKOUT</h1>
        	<h4>Your Total: R {{ $total }}</h4>
        	<form action="{{ route('checkout') }}" method="post" id="checkout_form">
        		{{ csrf_field() }}
        		<div class="row">
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="name">First Name:</label>
            				<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autofocus required>
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="last_name">Last Name:</label>
            				<input type="text" name="last_name" id="name" class="form-control" value="{{ old('last_name') }}" required>
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="addressline1">Address Line 1:</label>
            				<input type="text" id="addressline1" name="addressline1" class="form-control" value="{{ old('addressline1') }}" required>
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="addressline2">Address Line 2:</label>
            				<input type="text" id="addressline2" name="addressline2" class="form-control" value="{{ old('addressline2') }}">
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="city">City:</label>
            				<input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}" required>
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="state">State / Province:</label>
            				<input type="text" id="state" name="state" class="form-control" value="{{ old('state') }}" required>
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="zip">Zip / Postal Code:</label>
            				<input type="text" id="zip" name="zip" class="form-control" value="{{ old('zip') }}" required>
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="country">Country:</label>
            				<input type="text" id="country" name="country" class="form-control" value="{{ old('country') }}" required>
            			</div>
            		</div>
            		<!-- <div class="col-xs-12">
            			<div class="form-group">
            				<label for="card_name">Card Holder Name:</label>
            				<input type="text" id="card_name" class="form-control" value="{{ old('card_name') }}" required>
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="card_number">Credit Card Number:</label>
            				<input type="text" id="card_number" class="form-control" value="{{ old('card_number') }}" required>
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="card_expiry_month">Expiration Month:</label>
            				<input type="text" id="card_expiry_month" class="form-control" value="{{ old('card_expiry_month') }}" required>
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="card_expiry_year">Expiration Year:</label>
            				<input type="text" id="card_expiry_year" class="form-control" value="{{ old('card_expiry_year') }}" required>
            			</div>
            		</div>
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="card_cvc">CVC:</label>
            				<input type="text" id="card_cvc" class="form-control" value="{{ old('card_cvc') }}" required>
            			</div>
            		</div> -->
            		<div class="col-xs-12">
            			<div class="form-group">
            				<label for="phone">Phone Number:</label>
            				<input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
            			</div>
            		</div>
                    <input type="hidden" id="order_id" name="order_id" value="TheSkiDeck_{{ $str }}" required>
                    <input type="hidden" id="order_totalPrice" name="order_totalPrice" value="{{ $total }}" required>
            		<button type="submit" class="btn btn-success">Order Now</button>
        		</div>
        	</form>
        </div>
    </div>

@stop