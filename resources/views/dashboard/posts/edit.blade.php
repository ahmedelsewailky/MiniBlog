@extends('layouts.dashboard')
@section('title', 'Posts')
@section('breadcrumbs')
<li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('post.index') }}"> Posts</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card">
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-header main-color-bg">
            Post edit
        </div>

        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" class="form-select" name="category">
                                <option>Choose category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ ($post->category_id == $category->id) ? 'selected' : '' }}>
                                    {{ Str::ucfirst($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" class="form-select" name="status">
                                <option value="1" {{ ($post->status == 1) ? 'selected' : '' }}>Published</option>
                                <option value="0" {{ ($post->status == 0) ? 'selected' : '' }}>Un published</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="post-image-preview" for="image">
                            <img src="{{ $post->image }}" alt="post image preview" id="post-preview" width="210" height="210" class="w-100">
                            <input type="file" class="form-control d-none" name="image" id="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label form="article" class="form-label">Post article</label>
                    <textarea id="article" name="article" class="form-control">{!! $post->article !!}</textarea>
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
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                    id="tag-{{ $tag->id }}" @foreach ($post->tags as $t)
                                @if ($tag->id == $t->id) checked @endif
                                @endforeach
                                >
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
            <button type="sumbit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save Changes</button>
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
    $(function () {

        // Trigger summernote
        $('#article').summernote({
            height: 300
        });

        // Change image src when input chnage
        $('#image').change(function(){
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
            {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('#post-preview').attr('src', e.target.result);
                }
            reader.readAsDataURL(input.files[0]);
            }
        });
    });

</script>
@endsection
