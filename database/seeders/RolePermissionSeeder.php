<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //membuat role admin
        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        //membuat role user
        $userRole = Role::create([
            'name' => 'user',
        ]);

        //membuat akun admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        //memberi role admin ke akun admin
        $admin->assignRole($adminRole);
    }
}
