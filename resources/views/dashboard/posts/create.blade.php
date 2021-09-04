@extends('layouts.dashboard')
@section('title', 'Posts')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('post.index') }}"> Posts</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Create new post article</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card">
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-header main-color-bg">
            Create post article
        </div>

        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Post title">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4 mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" class="form-select" name="category">
                        <option>Choose category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ Str::ucfirst($category->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-5 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" class="form-select" name="status">
                        <option value="1">Published</option>
                        <option value="0">Un published</option>
                    </select>
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label form="article" class="form-label">Post article</label>
                    <textarea id="article" name="article" class="form-control"></textarea>
                    @error('article')
                    <p class="text-danger mb-0">{{ $message }}</p>
                @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="Tags" class="form-label">Tags</label>
                    @error('tags')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        @foreach ($tags as $tag)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]" id="tag-{{ $tag->id }}">
                                <label class="form-check-label" for="tag-{{ $tag->id }}" style="cursor: pointer">
                                {{ $tag->name }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer text-end">
            <button type="sumbit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</button>
        </div>
    </form>
</div>
@endsection
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/summernote/summernote-lite.min.css') }}">
@endsection
@section('custom-script')
    <script src="{{ asset('dashboard/vendors/summernote/summernote-lite.min.js') }}"></script>
    <script type="text/javascript">
    $(function() {
        $('#article').summernote({
            height: 300
        });
    });
    </script>
@endsection