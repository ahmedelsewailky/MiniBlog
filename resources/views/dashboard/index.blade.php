@extends('layouts.dashboard')
@section('content')
<!-- Website Overview -->
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Website Overview</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ App\Models\User::all()->count() }}</h2>
                <h4>Users</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 12</h2>
                <h4>Pages</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{ $posts->count() }}</h2>
                <h4>Posts</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> {{ $setting->site_visitors }}
                </h2>
                <h4>Visitors</h4>
            </div>
        </div>
    </div>
</div>

<!-- Latest Users -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Latest Users</h3>
    </div>
    <div class="panel-body">
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
