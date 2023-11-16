@extends('layouts.app')

@section('title', 'Halaman User')

@section('content')
    <div class="container">
        <div class="card bg-white">
            <div class="mx-3 my-3">
                <button class="btn btn-primary" data-bs-toggle="modal" id="addUserButton" data-bs-target="#addUserModal">
                    Tambah User
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTableUser">
                        <thead>
                        <tr>
                            <th class="col-md-1">No.</th>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-2">Avatar</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-2">Role</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Isi tabel akan dimuat oleh DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addUserModalLabel">Tambah User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" id="createFormUser" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" required id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" required id="avatar" name="avatar" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" required id="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="roles">Role</label>
                            <select name="roles" id="roles" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <button type="submit" id="createUserButton" class="btn btn-primary">Tambah Data</button>
                </div>
            </div>
        </div>
    </div>

    {{--    Edit Modal--}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Ubah User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editFormUser" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" required id="name_edit" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" required id="avatar_edit" name="avatar" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required id="email_edit" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="roles">Role</label>
                            <select name="roles" id="roles_edit" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <button type="submit" id="createUserButton" class="btn btn-primary">Tambah Data</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('users.ajax')
@endsection
