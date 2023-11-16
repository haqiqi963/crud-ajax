<?php

namespace App\DataTables;

use App\Models\User;
use DataTables;

class UserDataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function data()
    {
        $data = User::with('roles')->latest();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('role', function($user) {
                $roles = $user->getRoleNames()->implode(', ');
                return $roles;
            })
            ->addColumn('avatar',function($user) {
                $view = view('users.avatar',compact('user'));
                return $view;
            })
            ->addColumn('action', function($row) {
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.
                    '" class="btn btn-primary btn-sm btn-edit"><i class="bi bi-pencil-square"></i> Edit</a>';
                $btn .= '<a href="javascript:void(0)" data-id="'.$row->id.
                    '" class="btn btn-danger btn-sm btn-delete"><i class="bi bi-trash"></i> Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
