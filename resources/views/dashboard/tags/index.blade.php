@extends('layouts.dashboard')
@section('title', 'Tags')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Tags</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card tag-box">
    <div class="card-header main-color-bg">
        Tags list
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#create-tag">
                    <i class="fas fa-plus-circle"></i> 
                    Add new tag
                </a>
            </div>
            <div class="col-md-6 text-end">
                <input class="form-control" type="text" placeholder="Searching about tag ...">
            </div>
        </div>
        <br>
        @include('layouts.alert')
        <table class="table table-striped table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th></th>
            </tr>
            @php $i=1; @endphp
            @foreach ($tags as $tag)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $tag->name }}</td>
                <td>
                    <div class="d-flex">
                        <a href="#" class="btn btn-sm btn-success me-2" data-bs-toggle="modal" data-bs-target="#edit-tag-{{ $tag->id }}"><i class="fas fa-edit"></i> Edit</a> 
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-tag-{{ $tag->id }}">
                            <i class="fas fa-trash"></i> 
                            Delete
                        </a>
                    </div>
                </td>
            </tr>
            @include('dashboard.tags.confirm')
            @include('dashboard.tags.edit')
            @endforeach
        </table>
        <div class="d-flex justify-content-end">
            {{ $tags->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
@include('dashboard.tags.create')
@endsection