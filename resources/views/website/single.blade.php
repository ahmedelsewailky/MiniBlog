@extends('layouts.website')
@section('title', Str::limit($post->title, 10))
@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url('{{ $post->image }}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span
                        class="post-category text-white bg-success mb-3">{{ Str::ucfirst($post->category->name) }}</span>
                    <h1 class="mb-4"><a href="#">{{ $post->title }}</a></h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{ $post->user->image }}"
                                alt="Image" class="img-fluid" width="40px" height="40px"></figure>
                        <span class="d-inline-block mt-1">By {{ Str::ucfirst($post->user->name) }}</span>
                        <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">

        <div class="row blog-entries element-animate">

			<!-- Main Post Article -->
            <div class="col-md-12 col-lg-8 main-content">

                <div class="post-content-body">
                    {!! $post->article !!}
                </div>


                <div class="pt-5">
                    <p>Categories: <a href="#">{{ $post->category->name }}</a>, Tags: <a href="#">#manila</a>, <a
                            href="#">#asia</a></p>
                </div>


                <div class="pt-5">
                    <h3 class="mb-5">6 Comments</h3>
                    @comments(['model' => $post])
                    <!-- END comment-list -->
                </div>

            </div>
            <!-- END main-content -->


			<!-- Sidebar  -->
            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="{{ $post->user->image }}" alt="Image Placeholder" class="img-fluid mb-2">
                        <div class="bio-body">
                            <h2>{{ Str::ucfirst($post->user->name) }}</h2>
                            <p class="mb-4">{{ Str::limit($post->user->description, 100) }}</p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fab fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fab fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fab fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fab fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
							@foreach ($popular_posts as $post)
                            <li>
                                <a href="">
                                    <img src="{{ $post->image }}" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>{{ Str::limit($post->title, 40) }}</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">{{ $post->created_at->diffForHumans() }} </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
							@endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
						@foreach ($categories as $category)
                        <li><a href="#">{{ Str::ucfirst($category->name) }} <span>(12)</span></a></li>
						@endforeach
                    </ul>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @foreach ($tags as $tag)
                        <li><a href="#">{{ Str::ucfirst($tag->name) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>
@endsection
