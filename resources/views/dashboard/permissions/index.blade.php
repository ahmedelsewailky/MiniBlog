@extends('layouts.dashboard')
@section('title', 'Permissions')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Permissions</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card permission-box">
    <div class="card-header main-color-bg">
        Permissions list
    </div>
    <div class="card-body">
        <div class="link mb-3">
            <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus-circle"></i> 
                Add new permission
            </a>
        </div>
        @include('layouts.alert')
        <table class="table table-striped table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th></th>
            </tr>
            @foreach ($permissions as $permission)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $permission->name }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-sm btn-success me-2" href="{{ route('permissions.edit', $permission->id) }}"><i class="fas fa-edit"></i> Edit</a> 
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $permissions->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection