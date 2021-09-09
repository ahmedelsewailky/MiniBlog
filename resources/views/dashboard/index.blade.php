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

<!-- Charts -->
<div class="card mb-3">
    <div class="card-header  main-color-bg">
        Charts
    </div>
    <div class="card-body">
        <div class="pie-chart-container">
            <canvas id="pie-chart"></canvas>
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
@section('custom-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script>
    $(function () {
        //get the pie chart canvas
        var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
        var ctx = $("#pie-chart");

        //pie chart data
        var data = {
            labels: cData.label,
            datasets: [{
                label: "Users Count",
                data: cData.data,
                backgroundColor: [
                    "#DEB887",
                    "#A9A9A9",
                    "#DC143C",
                    "#F4A460",
                    "#2E8B57",
                    "#1D7A46",
                    "#CDA776",
                ],
                borderColor: [
                    "#CDA776",
                    "#989898",
                    "#CB252B",
                    "#E39371",
                    "#1D7A46",
                    "#F4A460",
                    "#CDA776",
                ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1]
            }]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Last week new post -  Day wise count",
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    fontColor: "#333",
                    fontSize: 16
                }
            }
        };

        //create Pie Chart class object
        var chart1 = new Chart(ctx, {
            type: "pie",
            data: data,
            options: options
        });

    });

</script>
@endsection
