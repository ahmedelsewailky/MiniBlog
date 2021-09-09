@extends('layouts.dashboard')
@section('title', 'Create user')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"> <a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Create new user</li>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header main-color-bg">
        Create new user</span>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Username -->
                <div class="form-group mb-3 col-md-12">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="name" placeholder="ex: john, peter_parker">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- E-Mail -->
                <div class="form-group mb-3 col-md-12">
                    <label class="form-label">E-Mail Address</label>
                    <input type="email" class="form-control" name="email" placeholder="ex: peter@email.com">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Minimum length for password is 8 charcters">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                    @error('confirm-password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mobile -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Mobile</label>
                    <input type="text" class="form-control" name="mobile" placeholder="ex: 012-34 56 78 9">
                    @error('mobile')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="ex: Egypt, Cairo">
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div class="form-group mb-3 col-md-5">
                    <label class="form-label">Role</label>
                    <select class="form-select" name="roles" aria-label="Default select example">
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Salary -->
                <div class="form-group mb-3 col-md-5">
                    <label class="form-label">Salary</label>
                    <input type="text" class="form-control" name="salary" placeholder="ex: 4020 EGP">
                    @error('salary')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- First Name -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="fname" placeholder="ex: Peter">
                    @error('fname')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lname" placeholder="ex: Parker">
                    @error('lname')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Avatar -->
                <div class="form-group mb-3 col-md-8">
                    <label class="form-label">Profile Image</label>
                    <input type="file" class="form-control" name="image" placeholder="Upload Image">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Avatar Preview -->
                <div class="form-group mb-3 col-md-4 text-end">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" alt="user profile image" width="120" height="120">
                </div>

                <!-- Social -->
                <div class="row">
                    <div class="form-group col-md-4 mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" name="social[fb]" id="facebook" placeholder="ex: https://facebook.com/ahmedelsewailky">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control" name="social[tw]" id="twitter" placeholder="ex: https://twitter.com/elsewailky">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="text" class="form-control" name="social[yt]" id="youtube" placeholder="ex: https://youtube.com/user/ahmedelsewailky">
                    </div>
                </div>
                <!-- User Resume -->
                <div class="form-group mb-3 col-md-12"">
                    <label for="bio" class="form-label"> User BIO</label>
                    <textarea name="bio" id="bio" cols="10" rows="3" class="form-control"> Leave some description about user ...</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</button>
        </form>
    </div>
</div>
@stop
