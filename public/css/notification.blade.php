<div class="btn btn-primary btn-block" id="notes" style="width: 100%;">
    @if (Auth::user()['email'] == 'superadministrator@app.com' | Auth::user()['email'] == 'editor@app.com')
    <hr>
        <a href="{{ route('notifications.create') }}" class="btn btn-success btn-lg" style="float: right;">CREATE NEW NOTIFICATION</a>
    @endif
    <p>NOTFICATIONS (Mouse-over)</p>
    <hr>
        @if ($notifications = App\Notification::all())
            @foreach ($notifications as $notification)
                @if ($notification->id == App\Notification::orderBy('id')->first()->id)
                    {{ $notification->notification_title }}
                    <br>
                    {{ $notification->notification_content }}
                @endif
            @endforeach
        @endif
    <a href='#'></a><a class = 'btn btn-warning btn-sm' href='#'>READ MORE</a><hr>
</div>