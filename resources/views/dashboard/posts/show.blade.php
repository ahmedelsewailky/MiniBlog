@extends('layouts.dashboard')
@section('title', $post->title)
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('post.index') }}"> Posts</a></li>
    <li class="breadcrumb-item active" aria-current="page"> {{ $post->title }}</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card">
    <div class="card-header main-color-bg">
    </div>
    <div class="card-body">
        <div class="links py-3 mb-3 d-flex justify-content-lg-end">
            <a href="{{ route('post', $post->slug) }}" target="_blank" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i> Go to link</a>
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-success mx-2"><i class="fas fa-edit"></i> Edit</a>
            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#post-{{ $post->id }}"><i class="fas fa-trash"></i> Delete</a>
        </div>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>Title</th>
                    <td>{{ $post->title }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $post->slug }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ Str::ucfirst($post->category->name) }}</td>
                </tr>
                <tr>
                    <th>Tags</th>
                    <td>laravel</td>
                </tr>
                <tr>
                    <th>Author</th>
                    <td>{{ Str::ucfirst($post->user->name) }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ ($post->status == 1) ? 'Published' : 'Non-Published' }}</td>
                </tr>
                <tr>
                    <th>Create At</th>
                    <td>{{ $post->created_at }}</td>
                </tr>
                <tr>
                    <th>Views</th>
                    <td>{{ $post->views }} view</td>
                </tr>
                <tr>
                    <th>Comments</th>
                    <td>{{ $post->comments->count() }} comment</td>
                </tr>
                <tr>
                    <th>Image Preview</th>
                    <td><img src="{{ $post->image }}" alt="post image" width="340" height="170"></td>
                </tr>
                <tr>
                    <th>Article</th>
                    <td>{!! $post->article !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@include('dashboard.posts.confirm')
@endsection