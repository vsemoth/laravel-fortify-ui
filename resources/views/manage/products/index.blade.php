@extends('layouts.app')

@section('htmlheader_title', 'Stock Items List')

@section('main-content')

    <div class="row">
        <div class="container">
            @section('contentheader_title')
                <div class="card-header">
                    <h1>All Products 
                            <a href="{{ route('products.create') }}" style="float: right;" class="btn btn-primary btn-sm">New</a>
                    </h1>
                </div>
            @endsection

            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-4">
                    @foreach($products as $product)
                            <img height="150px" src="/img/product_images/{{ $product->product_image }}" alt="{{ $product['style'] }} image">
                        <a class="btn btn-primary btn-lg text-sm-right" href="{{ route('products.show',$product['id']) }}" style="float: right;">View more...</a>
                        <p>Brand: {{ $product['brand'] }}</p>
                        <p>Style: {{ $product['style'] }}</p>
                        <p style="float: right;">
                            {!! Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) !!}
                                {{ Form::submit('DELETE', ['class' => 'btn btn-danger btn-sm']) }}
                            {!! Form::close() !!}
                        </p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection