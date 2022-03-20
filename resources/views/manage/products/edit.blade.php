@extends('layouts.app')

@section('title', $product['style'].' size '.$product['size'])

@section('styles')
    <style>
        ul {
            list-style-type: none;
        }
        ul .navigator {
            display: inline-block;
            clear: both;
        }
    </style>
@endsection

@section('main-content')
                        <div style="margin-top: 50px;">    
                        <h2>EDIT PRODUCT IMAGE</h2>
    <hr>
    {{-- @if (!empty($product->product_image)) --}}
        <p>
            <!--<input type="file" name="product_image" value="{{$product['product_image']}}" />-->
            <img src="/img/product_images/{{ $product->product_image }}" width='320px' />
            <!--<img src='{{ public_path("img/product_images/$product->product_image") }}' width='320px' />-->
        </p>
    {!! Form::open(['action' => ['ProductController@update', $product->id], 'method' => 'screenshot', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::file('product_image') }}
    </div>

    <br>
<!-- {{--
    {{ Form::label('category_id', 'Category:') }}

        <select name="category_id" class="form-control">

    @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
    @endforeach

        </select> --}} -->

    <hr>
        {{ Form::hidden('_method', 'PATCH') }}
      <!--<div class="modal-footer">-->
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        {{-- {{ Form::submit('Update Product Image', ['class' => 'btn btn-primary']) }} --}}
      <!--</div>-->
    <!-- {{-- {!! Form::close() !!}
    @endif --}} -->
                            {!! Form::open(['action' => ['ProductController@update', $product->id], 'method' => 'product']) !!}
                                <p><b>Category: </b><input type="text" name="item" value="{{$product['item']}}" /></p>
                                <p><b>Brand: </b><input type="text" name="brand" value="{{$product['brand']}}" /></p>
                                <p><b>Style: </b><input type="text" name="style" value="{{$product['style']}}" /></p>
                                <p><b>Color: </b><input type="text" name="color" value="{{$product['color']}}" /></p>
                                <p><b>Size: </b><input type="text" name="size" value="{{$product['size']}}" /></p>
                                <p><b>Price: </b><input type="text" name="price" value="{{$product['price']}}" /></p>
                                <hr />
                                {{ Form::hidden('_method', 'PUT') }}
                                {{ Form::submit('Product Update', ['class' => 'btn btn-success']) }}
                            {!! Form::close() !!}
                            <hr>
                                <div class="col-md-8" style="display: block;">
                                    <!-- <a class="btn btn-primary btn-lg text-sm-left" href="#">Order</a> -->
                                @if(Auth::user())
                                <ul>
                                    <li class="navigator"><a class="btn btn-primary btn-lg" href="{{ route('products.index') }}">Stock Items List</a></li>
                                    <li class="navigator"><a class="btn btn-danger btn-lg" href="{{ route('products.show',$product['id']) }}">Cancel</a></li>
                                </ul>
                                    
                                    
                                @endif
                                </div>
                            <hr>
                        </div>
                    </div>
                </div>
                        
            </div>
        </div>


@endsection