@extends('layouts.admin')

@section('htmlheader_title', 'Posts Index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>All Posts 
                            <a href="{{ route('kidsparties.create') }}" style="float: right;" class="btn btn-primary btn-sm">New</a>
                    </h1>
                </div>

                <div class="card-body">
                    <table class="table table-gridlines" style="width:100%; overflow: none;">
                        @foreach($kidsparties as $post)
                         @if(!empty($post))
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action:</th>
                                    <th></th>
                                    <th>NAV Map:</th>
                                    <th>
                                        <a href="{{ route('blog.parties',$post->blog_slug) }}">
                                            {{ $post->blog_title }}
                                        </a>
                                    </th>
                                </tr>                            
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td><a href="{{ route('kidsparties.edit',$post->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['KidspartiesController@destroy', $post->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) !!}
                                            {{ Form::submit('DELETE', ['class' => 'btn btn-danger btn-sm']) }}
                                        {!! Form::close() !!}
                                    </td>
                                    <td style="float: left;">
                                        @foreach (App\Kidsparty::all() as $post2) 
                                            @if (empty($post2->drop))
                                                @if ($post2->id != $post->id)
                                                    @if ($post2->id == $post->drop)
                                                        {{ $post2->blog_title }} ->
                                                    @endif 
                                                @endif
                                            @elseif(empty($post2->drop))
                                                {{ $post->blog_title }} ->
                                            @endif
                                        @endforeach
                                        @if (!empty($post2->drop))
                                            {{$post->blog_title}}
                                        @endif
                                    </td>
                                    <td>{{ $post->blog_content }}</td>
                                </tr>
                            </tbody>
                         @endif
                        @endforeach
                    </table>
                    <div align="center">
                        {{ $kidsparties->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
