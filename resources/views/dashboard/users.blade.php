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
            <div class="col-md-12">
                <input class="form-control" type="text" placeholder="Filter Users...">
            </div>
        </div>
        <br>
        <table class="table table-striped table-hover">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
                <th></th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td><img src="{{ $user->image }}" alt="user image" width="50" height="50"></td>
                <td>{{ Str::ucfirst($user->name) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('M D, Y') }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-success me-2" href="{{ route('users.edit', $user->id) }}">Edit</a> 
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
