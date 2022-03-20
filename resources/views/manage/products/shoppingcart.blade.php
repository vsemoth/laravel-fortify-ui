@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('main-content')

        @if(Session::has('cart'))
            <div style="display: relative; margin-top: 50px;" class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <ul class="list-group">
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <img height="50px" src="img/product_images/{{$product['item']['product_image']}}" alt="{{ $product['item']['style'] }} image"><br>
                                <span class="btn btn-danger badge" style="background-color: #ba1307;">{{ $product['qty'] }}</span>
                                <strong>{{ $product['item']['brand'] }}</strong>
                                <span class="label label-success">{{ $product['price'] }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs" id="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                                    <ul class="dropdown-menu is-open" role="menu" aria-labelledby="navbarDropdown">
                                        <li class="nav-item"><a class="dropdown-item btn btn-warning btn-sm" href="#">- 1</a></li>
                                        <li class="nav-item"><a class="dropdown-item btn btn-danger btn-sm" href="#">REMOVE</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-md-12">
                        <ul>
                            <li style="display: inline-block; font-weight: bold;">
                                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <span><strong style="font-weight: bold; padding: 5px;" class="btn-primary">Total: {{ $totalPrice }}</strong></span>
                                </div>                        
                            </li>
                            <li style="display: inline-block;">
                                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <a href="{{ route('checkout') }}" style="font-weight: bold;" type="button" class="btn btn-danger">CHECKOUT</a>
                                </div>                        
                            </li>
                        </ul>
                        <hr>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                <h2>Suggested Items:</h2>
                <hr>
                    @if($products = App\Product::orderBy('random')->limit(4)->get())
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-3">
                                <a href="{{ route('products.show',$product['id']) }}"><img height="150px" src="/img/product_images/{{ $product->product_image }}" alt="{{ $product['style'] }} image"></a>
                                <p>Brand: {{ $product['brand'] }}</p>
                                <p>Style: {{ $product['style'] }}</p>
                                <p align="center">
                                        <a class="btn btn-primary btn-sm text-sm-right" href="{{ route('products.show',$product['id']) }}">View more...</a>
                                    <a class="btn btn-success btn-sm text-sm-left" href="{{ route('products.addToCart',$product->id) }}">Add to Cart</a>
                                </p>
                                <hr>                                        
                            </div>
                        @endforeach
                    @endif
                    <div align="right">
                        <a style="text-align: right; margin-bottom: 40px; margin-top: 10px;" href="{{ url('catalogue') }}" class="btn btn-primary btn-lg">More Items...</a>
                    </div>
                </div>
            </div>
        @else
            <div style="margin: 60px 30px 40px 30px;" class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <h2>No Items in Cart!</h2>
                </div>
            </div>
            <div class="row">
                <div class="container">
                <h2>Suggested Items:</h2>
                <hr>
                    @if($products = App\Product::orderBy('random')->limit(4)->get())
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-3">
                                <img height="150px" src="/img/product_images/{{ $product->product_image }}" alt="{{ $product['style'] }} image">
                                <p>Brand: {{ $product['brand'] }}</p>
                                <p>Style: {{ $product['style'] }}</p>
                                <p align="center">
                                        <a class="btn btn-warning btn-sm text-sm-right" href="{{ route('products.show',$product['id']) }}">View more...</a>
                                    <a class="btn btn-primary btn-sm text-sm-left" href="{{ route('products.addToCart',$product->id) }}">Add to Cart</a>
                                </p>
                                <hr>                                        
                            </div>
                        @endforeach
                    @endif
                    <div align="right">
                        <a style="text-align: right; margin-bottom: 40px; margin-top: 10px;" href="{{ url('catalogue') }}" class="btn btn-primary btn-lg">More Items...</a>
                    </div>
                </div>
            </div>
        @endif

@endsection