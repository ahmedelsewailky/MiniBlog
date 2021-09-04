@extends('layouts.dashboard')
@section('title', 'Roles')
@section('breadcrumbs')
    <li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Roles</li>
@endsection
@section('content')
<!-- Website Overview -->
<div class="card role-box">
    <div class="card-header main-color-bg">
        Roles list
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus-circle"></i> 
                    Add new role
                </a>
            </div>
            <div class="col-md-6 text-end">
                <input class="form-control" type="text" placeholder="Searching about role ...">
            </div>
        </div>
        <br>
        @include('layouts.alert')
        <table class="table table-striped table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th></th>
            </tr>
            @foreach ($roles as $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-sm btn-success me-2" href="{{ route('roles.edit', $role->id) }}"><i class="fas fa-edit"></i> Edit</a> 
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection