@extends('layouts.app')

@section('htmlheader_title', 'Posts Index')

@section('content')
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>All Posts 
                            <a href="{{ route('posts.create') }}" style="float: right;" class="btn btn-primary btn-sm">New</a>
                    </h1>
                </div>

                <div class="card-body">
                    <table class="table" style="max-width:100%; overflow: none;">
                        @foreach($posts as $post)
                         @if(!empty($post))
                            <thead>
                                <tr style="max-width: 580px;">
                                    <th>#</th>
                                    <th style="max-width: 80px;">Action:</th>
                                    <th></th>
                                    <th><h3>Post Title:</h3></th>
                                    <th>Content</th>
                                    <th style="max-width: 100px;">NAV Map:</th>
                                </tr>                            
                            </thead>
                            <tbody>
                                <tr style="max-width: 580px;">
                                    <td>{!! $post->id !!}</td>
                                    <td style="max-width: 80px;">
                                        <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                    <td style="max-width: 80px;">
                                        {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) !!}
                                            {{ Form::submit('DELETE', ['class' => 'btn btn-danger btn-sm']) }}
                                        {!! Form::close() !!}
                                    </td>
                                    <td style="float: left;max-width: 100px;">
                                        <h2>
                                            <a href="{{ route('blog.single',$post->slug) }}">
                                                {{ $post->post_title }}
                                            </a>
                                        </h2>
                                    </td>
                                    <td style="max-width: 100px;">{{ Str::limit($post->post_content, 400) }}</td>
                                    <td style="float: left;max-width: 100px;">
                                        @foreach (App\Models\Post::all() as $post2) 
                                            @if (empty($post2->drop))
                                                @if ($post2->id != $post->id)
                                                    @if ($post2->id == $post->drop)
                                                        {!! $post2->post_title !!} ->
                                                    @endif 
                                                @endif
                                            @elseif(empty($post2->drop))
                                                {!! $post->post_title !!} ->
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                         @endif
                        @endforeach
                    </table>
                    <div align="center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
