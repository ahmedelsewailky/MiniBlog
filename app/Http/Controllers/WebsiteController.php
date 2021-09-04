<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function __construct()
    {
        $setting = Setting::all()->first();
        $setting->increment('site_visitors');
    }

    public function index()
    {
        $latest_posts = Post::latest()->where('status', '1')->take(5)->get();
        $recent_posts = Post::where('status', '1')->orderBy('created_at', 'DESC')->paginate(9);
        $recomended_posts = Post::where('status', '1')->orderBy('views', 'DESC')->take(4)->get();

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

    public function search(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::query()
            ->where('title', 'LIKE' ,"%{$search}%")
            ->orWhere('article', 'LIKE' , "%{$search}%")
            ->paginate(4);

        return view('website.search', compact(['posts', 'search']));
    }
}
