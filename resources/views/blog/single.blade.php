@extends('welcome')

@section('htmlheader_title', $post['post_title'])

@section('content')
	<div class="row">
		<div class="container">
            @if(Session::has('success'))
            <div class="row" style="margin-top: 30px;">
                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                    <div id="charge_message" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
            @endif
    			<!-- {{-- 
    			@if($post->slug == 'correct-clothing')
    			    @if(!empty($post['cover_image']))
			            <img src="storage/images/cover_images/{{ $post['cover_image'] }}" alt="{{ $post['post_title'] }} image">
			        @endif
			    @endif
			    --}} -->
			<div class="card">
    			<!-- {{-- <div class="card card-header">
    				<h1>{{ $post["post_title"] }}</h1>					
    			</div>
    			@if($post->slug == 'correct-clothing')
				<div align='center'>
				    <img src="{{ url('/img/whattowearposter2.jpg') }}" style='margin-right: 6px; overflow: none;' width='1109px' height='1571px' alt='What to wear page' />
				</div> --}} -->
				@if($post->slug == 'catalogue')

    <div class="row">
        <div class="container" style="clear: both; float:left; background-color: #eee;">

                <div class="card-header">
                    <p>
                        To order items please email <span style='color: red;'>info@ski.co.za</span> with the item color, brand and style you wish to order.
                    </p>
                    <h1>Stock Items</h1>
                </div>

                <!--<p>Under Development</p>-->
                    <!--{{--<ul><li>{{ dd($products) }}</li></ul>--}}-->
                    @foreach($products as $product)
                <div class="card card-body col-md-3 nav-link" align="center" style="min-height: 350px; max-height: 350px; flex: 1; background-color: #fff; border-radius: 5px;">
                            <a href="{{ route('products.show',$product['id']) }}"><img style="text-align: center; max-width: 100%;" height="150px" src='{{ url("/img/product_images/$product->product_image") }}' alt="{{ $product->style }} image"></a>
                        
                        <p style="text-align: left;">Size: {{ $product->size }}</p>
                        <p style="text-align: left;"><!-- Style: --> {{ $product->style }}</p>
                        <p align="center">
                            <a class="btn btn-primary btn-sm" href="{{ route('products.show',$product->id) }}">View more...</a>
                                    @if(Auth::guest())
                                            <a class="btn btn-success btn-sm text-sm-left" href="{{ route('products.addToCart',$product->id) }}">Add to Cart</a></li>
                                    @endif
                                    @if(Auth::user())
                                        @if(Auth::user()['admin'] != 1)
                                            <a class="btn btn-success btn-sm text-sm-left" href="{{ route('products.addToCart',$product->id) }}">Add to Cart</a></li>
                                        @endif
                                    @endif
                                    @if(Auth::user())
                                        @if(Auth::user()['admin'] == 1)
                                            <a class="btn btn-warning btn-sm text-sm-left" href="{{ route('products.edit',$product['id']) }}">Edit Items</a></li>
                                        @endif
                                    @endif
                        </p>
                </div>
                    @endforeach
                    <!-- {{-- <div align="center">
                        {{ $products->links() }}
                    </div> --}} -->
                </div>
    </div>
                @elseif($post->slug == 'shoppingcart')
                <div class="row">
                    <div class="container" style="margin-top: 40px; clear: both;">
                        @include('manage.products.shoppingcart')
                    </div>
                </div>
                    
                @elseif($post->slug == 'checkout')
                <div class="row">
                    <div class="container" style="margin-top: 40px; clear: both;">
                        @include('manage.products.checkout')
                    </div>
                </div>
                    
                @else
				<div class="card card-body">
					<p style='background-color: #999; color: #000;'>{!! $post["post_content"] !!}</p>
				</div>
				@endif
			</div>
			
		</div>
	</div>
@endsection