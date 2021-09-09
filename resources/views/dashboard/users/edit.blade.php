@extends('layouts.dashboard')
@section('title', 'Edit User')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"> <a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Edit page</li>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header main-color-bg">
        Edit user informations</span>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Username -->
                <div class="form-group mb-3 col-md-12">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- E-Mail -->
                <div class="form-group mb-3 col-md-12">
                    <label class="form-label">E-Mail Address</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Minimum length for password is 8 charcters">
                    <span class="text-muted"><em>Leave it blank if you won't need to change it</em></span>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm your newest password">
                    @error('confirm-password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mobile -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Mobile</label>
                    <input type="text" class="form-control" name="mobile" value="{{ $user->mobile }}">
                    @error('mobile')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div class="form-group mb-3 col-md-5">
                    <label class="form-label">Role</label>
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-select')) !!}
                    @error('roles')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Salary -->
                <div class="form-group mb-3 col-md-5">
                    <label class="form-label">Salary</label>
                    <input type="text" class="form-control" name="salary" value="{{ $user->salary }}">
                    @error('salary')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- First Name -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="fname" value="{{ $user->fname }}">
                    @error('fname')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lname" value="{{ $user->lname }}">
                    @error('lname')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Avatar -->
                <div class="form-group mb-3 col-md-8">
                    <label class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="{{ $user->image }}">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Avatar Preview -->
                <div class="form-group mb-3 col-md-4 text-end">
                    <img src="{{ $user->image }}" alt="user profile image" id="user-avatar" width="120" height="120">
                </div>

                <!-- Social -->
                <div class="row">
                    <div class="form-group col-md-4 mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" name="social[fb]" id="facebook" value="{{ $user->social['fb'] }}">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control" name="social[tw]" id="twitter" value="{{ $user->social['tw'] }}">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="text" class="form-control" name="social[yt]" id="youtube" value="{{ $user->social['yt'] }}">
                    </div>
                </div>
                <!-- User Resume -->
                <div class="form-group mb-3 col-md-12"">
                    <label for="bio" class="form-label"> User BIO</label>
                    <textarea name="bio" id="bio" cols="10" rows="3" class="form-control"> {{ $user->bio }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save Changes</button>
        </form>
    </div>
</div>
@stop
@section('custom-script')
<script type="text/javascript">
    $(function(){
        // Change image src when input chnage
        $('#image').change(function(){
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
            {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('#user-avatar').attr('src', e.target.result);
                }
            reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>        
@endsection
