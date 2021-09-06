@extends('layouts.dashboard')
@section('title', 'Notifications')
@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-home"></i> Dashboard</li>
    <li class="breadcrumb-item"> Notifications</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card mb-3">
    <div class="card-header main-color-bg">
        Notification list
    </div>
    <div class="card-body row">
        <table id="notification-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>User</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notify)
            
            <tr @if ($notify->read_at === NULL) style="background-color: #ffefee !important" @endif>
                <td><img src="@if (!File::exists(public_path($notify->data['image']))) https://shahidafridifoundation.org/wp-content/uploads/2020/06/no-preview.jpg @else {{$notify->data['image']}} @endif" alt="..." width="60" height="60"></td>
                <td>{{ Str::ucfirst($notify->notifiable->name) }}</td>
                <td>
                    {{ $notify->data['description'] }} 
                    <a href="{{ url('/panel/mark', $notify->data['id']) }}">{{ $notify->data['title'] }}</a>
                    - <span class="text-danger" style="font-size: 12px"><em>{{ $notify->created_at->diffForHumans() }}</em></span>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Image</th>
                <th>User</th>
                <th>Title</th>
            </tr>
        </tfoot>
    </table>
    </div>
</div>

@endsection

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/datatables/asset/css/jquery.dataTables.min.css"/>
@endsection

@section('custom-script')
    <script src="{{ asset('dashboard') }}/vendors/datatables/asset/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#notification-table').DataTable();
        } );
    </script>
@endsection