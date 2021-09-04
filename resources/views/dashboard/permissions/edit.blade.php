@extends('layouts.dashboard')
@section('title', 'Edit permission')
@section('breadcrumbs')
<li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('permissions.index') }}"> Permission</a></li>
<li class="breadcrumb-item active" aria-current="page"> Edit: {{ $permission->name }}</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card permission-create-form">
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header main-color-bg">
            Edit permission: {{ $permission->name }}
        </div>
        <div class="card-body">
            <div class="form-group mb-4">
                <label for="name" class="form-label">Permission name</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ $permission->name }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</button>
        </div>
    </form>
</div>
@endsection
