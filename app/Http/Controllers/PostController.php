<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Notifications\PostNotification; 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title',
            'image' => 'required|mimes:png,jpg,jpeg',
            'article' => 'required',
            'tags' => 'required'
        ]);
        // Handling post image firstly
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('dashboard/images/posts'), $image);
        $image = '/dashboard/images/posts/'. $image;

        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'image' => $image,
            'article' => $request->input('article'),
            'status' => $request->input('status'),
            'category_id' => $request->input('category'),
            'user_id' => Auth::user()->id,
            'views' => 0
        ];

        $post = Post::create($data);
        $post->tags()->attach($request->input('tags'));

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => "required|unique:posts,title, $post->id",
            'image' => 'mimes:png,jpg,jpeg',
            'article' => 'required',
            'tags' => 'required'
        ]);

        // Handling post image firstly
        if ($request->has('image')) {
            File::delete(public_path($post->image));
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('dashboard/images/posts'), $image);
            $image = '/dashboard/images/posts/' . $image;
        } else {
            $image = $post->image;
        }

        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'image' => $image,
            'article' => $request->input('article'),
            'status' => $request->input('status'),
            'category_id' => $request->input('category'),
            'user_id' => Auth::user()->id
        ];

        $post->update($data);
        $post->tags()->sync($request->input('tags'));

        $user = User::find(Auth::user()->id);
        $notify = new PostNotification($post);
        $notify->setDescription('has updated his article');
        $user->notify($notify);
        
        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        File::delete(public_path($post->image));
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post removed successfully');
    }
}
