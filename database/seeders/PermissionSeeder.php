<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    // Memeriksa apakah permission sudah ada, jika belum baru dibuat
    if (!Permission::where('name', 'edit users')->where('guard_name', 'web')->exists()) {
        Permission::create(['name' => 'edit users', 'guard_name' => 'web']);
    }

    if (!Permission::where('name', 'delete users')->where('guard_name', 'web')->exists()) {
        Permission::create(['name' => 'delete users', 'guard_name' => 'web']);
    }
}
}
