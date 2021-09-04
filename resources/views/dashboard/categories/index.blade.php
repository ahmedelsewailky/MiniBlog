@extends('layouts.dashboard')
@section('title', 'Categories')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Categories</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card category-box">
    <div class="card-header main-color-bg">
        Categorys list
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#create-category">
                    <i class="fas fa-plus-circle"></i> 
                    Add new category
                </a>
            </div>
            <div class="col-md-6 text-end">
                <input class="form-control" type="text" placeholder="Searching about category ...">
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
            @foreach ($categories as $category)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <div class="d-flex">
                        <a href="#" class="btn btn-sm btn-success me-2" data-bs-toggle="modal" data-bs-target="#edit-category-{{ $category->id }}"><i class="fas fa-edit"></i> Edit</a> 
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-category-{{ $category->id }}">
                            <i class="fas fa-trash"></i> 
                            Delete
                        </a>
                    </div>
                </td>
            </tr>
            @include('dashboard.categories.confirm')
            @include('dashboard.categories.edit')
            @endforeach
        </table>
        <div class="d-flex justify-content-end">
            {{ $categories->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
@include('dashboard.categories.create')
@endsection