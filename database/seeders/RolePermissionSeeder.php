<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'hapus-user']);
        Permission::create(['name' => 'lihat-user']);

        Permission::create(['name' => 'tambah-role']);
        Permission::create(['name' => 'edit-role']);
        Permission::create(['name' => 'hapus-role']);
        Permission::create(['name' => 'lihat-role']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
//
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-role');
        $roleAdmin->givePermissionTo('edit-role');
        $roleAdmin->givePermissionTo('hapus-role');
        $roleAdmin->givePermissionTo('lihat-role');

        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');


        $roleUser = Role::findByName('user');
        $roleUser->givePermissionTo('lihat-role');
        $roleAdmin->givePermissionTo('lihat-user');
    }
}
