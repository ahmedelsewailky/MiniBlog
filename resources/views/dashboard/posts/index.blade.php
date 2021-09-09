@extends('layouts.dashboard')
@section('title', 'Posts')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Posts</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card">
    <div class="card-header main-color-bg">
        Posts list
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                @can('post-create')
                <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Create new post</a>
                @endcan
            </div>
            <div class="col-md-6 text-end">
                <input class="form-control" type="text" placeholder="Searching for post...">
            </div>
        </div>
        <br>
        @include('layouts.alert')
        <table class="table table-striped table-hover">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Views</th>
                <th>Comments</th>
                <th></th>
            </tr>
            @php $i=1; @endphp
            @foreach ($posts as $post)
            <tr>
                <td>{{ $i++ }}</td>
                <td><img src="{{ $post->image }}" alt="post image" width="50" height="50"></td>
                <td><a href="{{ route('post.show', $post->id) }}">{{ Str::limit($post->title, 20) }}</a></td>
                <td>{{ Str::ucfirst($post->category->name) }}</td>
                <td>{{ Str::ucfirst($post->user->name) }}</td>
                <td>
                    @if ($post->status == 1)
                    <span class="text-success" data-bs-toggle="tooltip" title="Published"><i class="fas fa-check-square"></i></span>
                    @else 
                    <span class="text-danger" data-bs-toggle="tooltip" title="Published"><i class="fas fa-times-circle"></i></span>
                    @endif
                </td>
                <td>{{ $post->views }}</td>
                <td>{{ $post->comments->count() }}</td>
                <td>
                    <div class="d-flex">
                        @can('post-edit')
                        <a class="btn btn-sm btn-success me-2" href="{{ route('post.edit', $post->id) }}"><i class="fas fa-edit"></i></a> 
                        @endcan
                        @can('post-delete')
                        <a class="btn btn-sm btn-primary me-2" href="{{ route('post.show', $post->id) }}"><i class="fas fa-eye"></i></a> 
                        @endcan
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-end">
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
@section('custom-script')
<script type="text/javascript">
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection