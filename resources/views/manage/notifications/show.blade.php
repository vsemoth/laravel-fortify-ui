@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                     @section('contentheader_title')
                        View Notification
                     @endsection
                </div>

                <div class="card-body">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ $notification->notification_title }}</th>
                                </tr>                            
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! '<p>'.$notification->notification_content.'</p>' !!}</td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
