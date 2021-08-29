@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-home"></i> Dashboard</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card mb-3">
    <div class="card-header main-color-bg">
        Website Overview
    </div>
    <div class="card-body row">
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="fas fa-users"></span> {{ App\Models\User::all()->count() }}</h2>
                <h4>Users</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="fas fa-file-alt"></span> 12</h2>
                <h4>Pages</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="fas fa-underline"></span> {{ $posts->count() }}</h2>
                <h4>Posts</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="fas fa-chart-bar"></span> {{ $setting->site_visitors }}
                </h2>
                <h4>Visitors</h4>
            </div>
        </div>
    </div>
</div>

<!-- Latest Users -->
<div class="card">
    <div class="card-header  main-color-bg">
        Latest Users
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ Str::ucfirst($user->name) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('M D, Y') }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
