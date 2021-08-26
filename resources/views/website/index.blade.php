@extends('layouts.website')
@section('title', 'Index')
@section('content')

<!-- Latest Posts Grird -->
<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            <div class="col-md-4">
                @foreach ($latest_posts->splice(0,2) as $post)
                <a href="single.html" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{ $post->image }}');">

                    <div class="text">
                        <h2>{{ $post->title }}</h2>
                        <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col-md-4">
              @foreach ($latest_posts->splice(0,1) as $post)
              <a href="single.html" class="h-entry img-5 h-100 gradient"
                  style="background-image: url('{{ $post->image }}');">

                  <div class="text">
                      <div class="post-categories mb-3">
                          <span class="post-category bg-danger">{{ Str::ucfirst($post->category->name) }}</span>
                      </div>
                      <h2>{{ $post->title }}</h2>
                        <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                  </div>
              </a>
               @endforeach
            </div>
            <div class="col-md-4">
                @foreach ($latest_posts->splice(0,2) as $post)
                <a href="single.html" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{ $post->image }}');">

                    <div class="text">
                        <h2>{{ $post->title }}</h2>
                        <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Recent Posts -->
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($recent_posts as $post)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="single.html"><img src="{{ $post->image }}" alt="Image" class="img-fluid rounded"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{ Str::ucfirst($post->category->name) }}</span>

                        <h2><a href="single.html">{{ $post->tilte }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg"
                                    alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{ Str::ucfirst($post->user->name) }}</a></span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                        </div>

                        <p>{{ str::limit($post->article, 200)}}</p>
                        <p><a href="#">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                <div class="custom-pagination">
                    {{ $recent_posts->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
