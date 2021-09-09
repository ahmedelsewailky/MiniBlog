
@extends('layouts.dashboard')
@section('title', 'Users')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Users</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card">
    <div class="card-header main-color-bg">
        Users
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                @can('user-create')
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Add new user</a>
                @endcan
            </div>
            <div class="col-md-6 text-end">
                <input class="form-control" type="text" placeholder="Filter Users...">
            </div>
        </div>
        <br>
        @include('layouts.alert')
        <table class="table table-striped table-hover">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th></th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td><img src="{{ $user->image }}" alt="user image" width="50" height="50"></td>
                <td>{{ Str::ucfirst($user->name) }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        {{ $v }}
                        @endforeach
                    @endif
                </td>
                <td>
                    <div class="d-flex">
                        @can('user-edit')
                        <a class="btn btn-sm btn-success me-2" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i> Edit</a> 
                        @endcan
                        @can('user-delete')
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#user-{{ $user->id }}">
                            <i class="fas fa-trash"></i> 
                            Delete
                        </a>
                        @endcan

                    </div>
                </td>
            </tr>
            @include('dashboard.users.confirm')
            @endforeach
        </table>
    </div>
</div>
@endsection

