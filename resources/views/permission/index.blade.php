@extends('layouts.app')

@section('title', 'Halaman Permission')

@section('content')
    <div class="container">
        <div class="card bg-white">
            <div class="card-body">
                <table id="dataTablePermission" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
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
@endsection
@section('scripts')
    @include('permission.ajax')
@endsection
