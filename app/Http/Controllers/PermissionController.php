<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionDataTable;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request, PermissionDataTable $datatable)
    {
        if($request->ajax()){
            return $datatable->data();
        }

        return view('permission.index');
    }
}
