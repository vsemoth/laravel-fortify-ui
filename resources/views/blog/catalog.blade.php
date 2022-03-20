@extends('welcome')

@section('htmlheader_title', 'Stock Items List')

@section('main-content')

    <div class="row">
        <div class="container">
            @section('contentheader_title')
                <div class="card-header">
                    <h1>All Products
                    @if(!empty(Auth::user()))
                    @if(Auth::user()->email == 'bookings@ski.co.za')
                        <a href="{{ route('products.create') }}" style="float: right;" class="btn btn-primary btn-sm">New</a>
                    @endif
                    @endif
                    </h1>
                </div>
            @endsection

            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-4">
                    @foreach($products as $product)
                            <img height="150px" src='{{ url("storage/images/product_images/$product->product_image") }}' alt="{{ $product['style'] }} image">
                        <a class="btn btn-primary btn-lg text-sm-right" href="{{ route('products.show',$product['id']) }}" style="float: right;">View more...</a>
                        <p>Brand: {{ $product['brand'] }}</p>
                        <p>Style: {{ $product['style'] }}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection