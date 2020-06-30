<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Notifications\CrewMemberInfo;
use App\Rank;
use App\User;
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
        $notifications = auth()->user()->notifications->where('type', CrewMemberInfo::class)->all();

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
    public function store(Request $request)
    {
        $notificationData = request()->validate([
            'content' => ['required'],
            'rank_id' => 'required',
        ]);

        $notificationData['author_id'] = auth()->user()->id;

        $users = User::where('rank_id', $notificationData['rank_id'])->get();
        Notification::send($users, new CrewMemberInfo($notificationData));

        return redirect()->route('notification.index')->withSuccess('Notification saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function seen(Request $request, Notification $notification)
    {
        $notification = auth()->user()->notifications->find($request->notification);

        if($notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
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
