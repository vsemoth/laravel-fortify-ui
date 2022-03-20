@extends('layouts.app')

@foreach($posts as $post)
    @section('title', config('app.name')." | $post->post_title")
@endforeach

@section('main-content')
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-8 offset-2">
                    @foreach($posts as $post)
                        @if($post->post_title == 'hyperli-voucher-terms')
                            {!! $post->post_content !!}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection