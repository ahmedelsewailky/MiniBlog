
@extends('layouts.dashboard')
@section('title', 'Subscribers')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Subscribers</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card">
    <div class="card-header main-color-bg">
        Subscribers list
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <tr>
                <th>#</th>
                <th>E-Mail Address</th>
            </tr>
            @if (!empty($subscribers))
            @php
                $i = 1;
            @endphp
            @foreach ($subscribers as $subscriber)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $subscriber->email }}</td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td colspan="2" class="text-center">No records available</td>
            </tr>
            @endif
        </table>
    </div>
</div>
@endsection

