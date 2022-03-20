@extends('layouts.app')

@section('htmlheader_title', 'notifications Index')

     @section('contentheader_title')
        <h1>Notification Index</h1>
            <a href="{{ route('notifications.create') }}" style="float: right;" class="btn btn-primary btn-sm">New Notification</a>
     @endsection

@section('content')

    <div class="card-body">
        <table class="table">
            @foreach($notifications as $notification)
            {{-- dd($notification) --}}
             @if(!empty($notification))
                <thead>
                    <tr>
                        <th>#</th>
                        <th>
                            <a href="{{ route('notifications.show',$notification->id) }}">
                                {{ $notification->notification_title }}
                            </a>
                        </th>
                        <th>Action:</th>
                        <th></th>
                        <th>NAV Map:</th>
                    </tr>                            
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $notification->id }}</td>
                        <td>{!! $notification->notification_content !!}</td>
                        <td>
                            {!! Form::open(['action' => ['NotificationController@destroy', $notification->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) !!}
                                {{ Form::submit('DELETE', ['class' => 'btn btn-danger btn-sm']) }}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            <a href="{{ route('notifications.edit',$notification->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td style="float: left;">
                            {{-- @foreach (App\notification::all() as $notification2) 
                                                                                        @if (!count($notification2->drop) > 0)
                                                                                            @if ($notification2->id != $notification->id)
                                                                                                @if ($notification2->id == $notification->drop)
                                                                                                    {{ $notification2->notification_title }} ->
                                                                                                @endif 
                                                                                            @endif
                                                                                        @elseif(!count($notification2->drop) > 0)
                                                                                            {{ $notification->notification_title }} ->
                                                                                        @endif
                                                                                    @endforeach
                                                                                    @if (count($notification2->drop) > 0)
                                                                                        {{$notification->notification_title}}
                                                                                    @endif --}}
                        </td>
                    </tr>
                </tbody>
             @endif
            @endforeach
        </table>
    </div>

@endsection