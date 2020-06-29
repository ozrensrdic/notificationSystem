<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Rank;
use App\Role;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::where('rank_id', auth()->user()->rank_id)->get();

        if (auth()->user()->role_id === Role::ADMINISTRATOR) {
            $notifications = Notification::all();
        }

        return view('notification.preview', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranks = Rank::all();

        return view('notification.create', compact('ranks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Notification $notification)
    {
        $notificationData = request()->validate([
            'content' => ['required'],
            'rank_id' => 'required',
        ]);

        $notificationData['author_id'] = auth()->user()->id;

        $notification->create($notificationData);

        return redirect()->route('notification.index')->withSuccess('Notification saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
