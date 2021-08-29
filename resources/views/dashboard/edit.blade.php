@extends('layouts.dashboard')
@section('title', 'Edit User')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"> <a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Users</li>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header main-color-bg">
        Edit User: <span class="fw-bold">{{ Str::ucfirst($user->name) }}</span>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Username -->
                <div class="form-group mb-3 col-md-12">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Username" value="{{ $user->name }}">
                </div>

                <!-- E-Mail -->
                <div class="form-group mb-3 col-md-12">
                    <label class="form-label">E-Mail Address</label>
                    <input type="email" class="form-control" placeholder="User E-Mail" value="{{ $user->email }}">
                </div>

                <!-- Password -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Reset Password">
                    <span class="text-primary" style="font-size: 12px">Leave blank if you don't need to change it</span>
                </div>

                <!-- Confirm Password -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="RePeat Password Again">
                </div>

                <!-- Mobile -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Mobile</label>
                    <input type="text" class="form-control" placeholder="Enter Phone Number" value="012-12345678">
                </div>

                <!-- Address -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" placeholder="User Address" value="Egypt, Cairo">
                </div>

                <!-- Role -->
                <div class="form-group mb-3 col-md-5">
                    <label class="form-label">Role</label>
                    <select class="form-select" aria-label="Default select example">
                        <option value="2">Owner</option>
                        <option value="3">Admin</option>
                        <option value="1" selected="selected">Post Creator</option>
                    </select>
                </div>

                <!-- Salary -->
                <div class="form-group mb-3 col-md-5">
                    <label class="form-label">Salary</label>
                    <input type="text" class="form-control" placeholder="User Salary" value="2500 EGP">
                </div>

                <!-- First Name -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" placeholder="User First Name" value="Ahmed">
                </div>

                <!-- Last Name -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" placeholder="User Last Name" value="Elsewailky">
                </div>

                <!-- Image Avatar -->
                <div class="form-group mb-3 col-md-8">
                    <label class="form-label">Profile Image</label>
                    <input type="file" class="form-control" placeholder="Upload Image">
                </div>

                <!-- Image Avatar Preview -->
                <div class="form-group mb-3 col-md-4 text-end">
                    <img src="{{ $user->image }}" alt="user profile image" width="120" height="120">
                </div>

                <!-- User Resume -->
                <div class="form-group mb-3 col-md-12">
                    <label class="form-label">User BIO</label>
                    <textarea name="editor1" class="form-control" placeholder="User Resume">
                            {!! $user->description !!}
                    </textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-default" value="Submit">
        </form>
    </div>
</div>
@stop
