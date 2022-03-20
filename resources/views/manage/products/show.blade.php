@extends('layouts.app')

@section('title', $product['style'].' size '.$product['size'])

@section('styles')
    <style>
        ul {
            display: flex;
            list-style-type: none;
        }
        ul .navigator {
            list-style: none;
            display: inline-block;
            clear: both;
            padding: 0 20px 0 20px;
        }
    </style>
@endsection

@section('main-content')

                <div class="row">
        <div class="container" style="margin-top: 50px;">
            <div class="col-md-12">
                    <div class="col-md-6">
                        <div style="margin-top: 50px;">
                           <img src='{{ url("img/product_images/$product->product_image") }}' width='320px' alt="{{ $product['style'] }} image">
                        </div>
                    </div>
                        
                    <div class="col-md-6">
                        <div style="margin-top: 50px;">
                            <p><b>Category: </b>{{$product['item']}}</p>
                            <p><b>Brand: </b>{{$product['brand']}}</p>
                            <p><b>Style: </b>{{$product['style']}}</p>
                            <p><b>Color: </b>{{$product['color']}}</p>
                            <p><b>Price: </b>R {{$product['price']}}</p>
                            <hr>
                        </div>
                            <div class="container" style="display: block; margin-bottom: 150px;">
                                <div class="col-md-6">
                                        
                                @if(Auth::user())
                                <ul>
                                    <li class="navigator"><a class="btn btn-primary btn-lg" href="{{ route('products.index') }}">Stock Items List</a></li>
                                    @if(Auth::user())
                                        @if(Auth::user()['admin'] == 1)
                                            <li class="navigator"><a class="btn btn-warning btn-lg" href="{{ route('products.edit',$product['id']) }}">Edit Items</a></li>
                                        @endif
                                    @endif
                                    <li>
                                    @if(Auth::user())
                                        @if(Auth::user()['admin'] != 1)
                                            <a class="btn btn-success btn-lg text-sm-left" href="{{ route('products.addToCart',$product->id) }}">Add to Cart</a></li>
                                        @endif
                                    @endif
                                </ul>
                                @elseif(Auth::guest())
                                    <div class="row" style="padding: 0 auto;">
                                   <p align="center"><a class="btn btn-primary btn-lg text-sm-right" href="{{ url('catalogue') }}">Stock Items List</a>
                                    <a class="btn btn-success btn-lg text-sm-left" href="{{ route('products.addToCart',$product->id) }}">Add to Cart</a></p>
                                    </div>                         
                                @endif
                                <!-- <a class="btn btn-primary btn-lg text-sm-left" href="#">Order</a> -->  
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>


@endsection