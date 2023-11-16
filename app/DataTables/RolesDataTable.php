<?php

namespace App\DataTables;

use Spatie\Permission\Models\Role;
use DataTables;

class RolesDataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function data()
    {
        $data = Role::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '<button><a href="javascript:void(0)" id="'.$row->id.
                    '" class="btn btn-primary btn-sm btn-edit">Edit</a>';
                $btn .= '<a href="javascript:void(0)" id="'.$row->id.
                    '" class="btn btn-danger btn-sm btn-delete">Delete</a></button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

