<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        $admin_role = Role::query()->firstOrCreate([
            'title' => 'admin'
        ],[
            'title' => 'admin',
            'slug' => 'admin'
        ]);
        $admin_role->permissions()->attach($permissions);

        Admin::query()->create([
            'role_id' => $admin_role->id,
            'username' => 'alimusavi',
            'email' => 'alimusavi77@gmail.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
