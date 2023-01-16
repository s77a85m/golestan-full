<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::query()->where('title', 'index_unit')->first();
        $role = Role::query()->create([
                'title' => 'Student',
                'slug'  => 'student',
        ]);

        $role->permissions()->attach($permission);


    }
}
