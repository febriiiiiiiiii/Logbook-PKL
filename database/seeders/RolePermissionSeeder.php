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
        // Permission::create(['name'=>'tambah-user']);
        // Permission::create(['name'=>'edit-user']);
        // Permission::create(['name'=>'hapus-user']);
        // Permission::create(['name'=>'lihat-user']);
        
        Permission::create(['name'=>'tambah-jurusan']);
        Permission::create(['name'=>'edit-jurusan']);
        Permission::create(['name'=>'hapus-jurusan']);
        Permission::create(['name'=>'lihat-jurusan']);
        
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'staf']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-jurusan');
        $roleAdmin->givePermissionTo('edit-jurusan');
        $roleAdmin->givePermissionTo('hapus-jurusan');
        $roleAdmin->givePermissionTo('lihat-jurusan');

        $roleStaf = Role::findByName('staf');
        $roleStaf->givePermissionTo('edit-jurusan');
        $roleStaf->givePermissionTo('lihat-jurusan');
    }
}
