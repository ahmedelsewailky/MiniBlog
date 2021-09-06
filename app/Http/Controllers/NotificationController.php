<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    /**
     * Get all notification about post actions within table list
     * 
     * @return array
     */
    public function index()
    {
        $notifications = auth()->user()->notifications;
        return view('dashboard.notifications', compact('notifications'));
    }


    /**
     * Make all notifications as read
     * 
     * return respononse
     */
    public function markAll()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }


    /**
     * Make spesific notification read
     */
    public function markAsRead($post_id)
    {
        $un_read_notifications = auth()->user()->unreadNotifications;
        if (count($un_read_notifications) > 0) {
            $id = $un_read_notifications[0]->id;
            auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        } 
        return redirect()->route('post.show', $post_id);
    }

}
