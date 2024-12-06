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
        $permissions = [
            'lihat-jurusan', 'tambah-jurusan', 'edit-jurusan', 'hapus-jurusan',
            'lihat-sekolah', 'tambah-sekolah', 'edit-sekolah', 'hapus-sekolah',
        ];

        foreach($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $adminSuper = Role::firstOrCreate(['name' => 'admin-super']);
        $adminPKL = Role::firstOrCreate(['name' => 'admin-PKL']);
        $pembimbingLapangan = Role::firstOrCreate(['name' => 'pembimbing-lapangan']);
        $pembimbingSekolah = Role::firstOrCreate(['name' => 'pembimbing-sekolah']);
        $siswa = Role::firstOrCreate(['name' => 'siswa']);

        $adminPKL->givePermissionTo([
            'lihat-jurusan', 'tambah-jurusan', 'edit-jurusan', 'hapus-jurusan',
            'lihat-sekolah', 'tambah-sekolah', 'edit-sekolah', 'hapus-sekolah',
        ]);

        $siswa->givePermissionTo(['lihat-sekolah']);

    }
}
