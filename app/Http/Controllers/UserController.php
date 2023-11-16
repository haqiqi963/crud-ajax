<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request, UserDataTable $dataTable)
    {
        if($request->ajax()){
            return $dataTable->data();
        }

        $roles = Role::all();
        return view('users.index', compact('roles'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|in:admin,user',
        ]);

        $newName = '';

        if ($request->file('avatar')) {
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;

            // menyimpan gambar ke dir image
            $path = $request->file('avatar')->storeAs('image', $newName);
        }

        // Buat user baru dan simpan ke database
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'avatar' => $path,
        ]);

        // Temukan atau buat peran (role) dan beri peran tersebut ke user
        $role = Role::firstOrCreate(['name' => $request->input('roles')]);
        $user->assignRole($role);

        return response()->json(['message' => 'User registered and assigned role successfully']);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}

