<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get data from DB
        $notifications = Notification::all();

        // Return Notification index with DB data
        return view('manage.notifications.index')->with('notifications', $notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return notification create view
        return view('manage.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Notification Data
        $this->validate($request, [
            'notification_title' => 'Required|string',
            'notification_content' => 'Required|min:8'
        ]);

        // Create new notification instance
        $notification = new Notification;

        // Match request data to DB
        $notification->notification_title = $request->input('notification_title');
        $notification->notification_content = $request->input('notification_content');

        // Save Notification to Database
        $notification->save();

        // Redirect to Home
        return redirect()->route('notifications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get data from database
        $notification = Notification::find($id);

        // Return selected notification with DB data
        return view('manage.notifications.show')->with('notification', $notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find notification in DB
        $notification = Notification::find($id);

        // Return notification edit view
        return view('manage.notifications.edit')->with('notification', $notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate Notification Data
        $this->validate($request, [
            'notification_title' => 'Required|string',
            'notification_content' => 'Required|min:8'
        ]);

        // Create new notification instance
        $notification = Notification::find($id);

        // Match request data to DB
        $notification->notification_title = $request->input('notification_title');
        $notification->notification_content = $request->input('notification_content');

        // Save Notification to Database
        $notification->save();

        // Redirect to Home
        return redirect()->route('notifications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find Notification id
        $notification = Notification::find($id);

        // Process action
        $notification->delete();

        // Return redirect to index
        return redirect()->route('notifications.index');
    }
}
