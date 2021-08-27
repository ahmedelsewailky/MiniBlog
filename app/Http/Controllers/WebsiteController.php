<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $latest_posts = Post::latest()->take(5)->get();
        $recent_posts = Post::orderBy('created_at', 'DESC')->paginate(9);
        $recomended_posts = Post::orderBy('views', 'DESC')->take(4)->get();
        return view('website.index', compact([
            'latest_posts',
            'recent_posts',
            'recomended_posts'
        ]));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $popular_posts = Post::orderBy('views', 'DESC')->take(3)->get();
        return view('website.single', compact(['post', 'popular_posts']));
    }
}
