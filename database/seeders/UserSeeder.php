<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234')
        ]);
        $admin->assignRole('admin');

        $staf = User::create([
            'name' => 'staf',
            'email' => 'staf@gmail.com',
            'password' => bcrypt('staf1234')
        ]);
        $staf->assignRole('staf');
    }
}
