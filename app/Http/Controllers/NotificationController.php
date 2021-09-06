<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index()
    {
        return view('dashboard.notifications');
    }

    public function markAll()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function markAsRead($post_id)
    {
        $id = auth()->user()->unreadNotifications[0]->id;
        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        return redirect()->route('post.show', $post_id);
    }
}
