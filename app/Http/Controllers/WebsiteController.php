<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $latest_posts = Post::latest()->take(5)->get();
        return view('website.index', compact([
            'latest_posts'
        ]));
    }
}
