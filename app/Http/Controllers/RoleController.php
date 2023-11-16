<?php

namespace App\Http\Controllers;

use App\DataTables\RolesDataTable;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request, RolesDataTable $datatable)
    {
        if ($request->ajax()) {
            return $datatable->data();
        }
        return view('roles.index');
    }
}
