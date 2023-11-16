@extends('layouts.app')

@section('title', 'Manajemen Role')

@section('content')
    <div class="container">
        <div class="card bg-white">
            <div class="mx-3 my-3">
                <button class="btn btn-primary" data-bs-toggle="modal" id="addUserButton" data-bs-target="#addUserModal">
                    Tambah Role</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTableRole">
                        <thead>
                        <tr>
                            <th class="col-md-1">No.</th>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('roles.ajax')
@endsection

