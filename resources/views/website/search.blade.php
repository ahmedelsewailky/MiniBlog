@extends('layouts.website')
@section('title', 'Search')
@section('content')
<!-- Search Resualt -->
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Available search results for: <span class="text-orange">{{ $search }}</span></h2>
            </div>
        </div>
        <div class="row">
            @if ($posts->isNotEmpty())
                @foreach ($posts as $post)
                <div class="col-lg-4 mb-4">
                    <div class="entry2">
                        <a href="{{ route('post', $post->slug) }}"><img src="{{ $post->image }}" alt="Image"
                                class="img-fluid rounded"></a>
                        <div class="excerpt">
                            <span
                                class="post-category text-white bg-secondary mb-3">{{ Str::ucfirst($post->category->name) }}</span>

                            <h2><a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img src="{{ $post->user->image }}"
                                        alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a
                                        href="#">{{ Str::ucfirst($post->user->name) }}</a></span>
                                <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                            </div>

                            <p>{{ str::limit($post->article, 200)}}</p>
                            <p><a href="{{ url('/post', $post->slug) }}">Read More</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <h4 class="text-center">No result posts available</h4>
            @endif
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                <div class="custom-pagination">
                    {{ $posts->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
