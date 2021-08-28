<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
            'recomended_posts',
        ]));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->increment('views');
        $tags = Tag::all();
        $popular_posts = Post::orderBy('views', 'DESC')->take(3)->get();
        return view('website.single', compact(['post', 'popular_posts', 'tags']));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->paginate(9);
        return view('website.category', compact(['posts', 'category']));
    }
}
