<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        professor permissions
        DB::table('permissions')->insert([
            [
                'title' => 'index_professor',
                'label' => 'مشاهده اساتید',
                'slug' => 'index_professor'
            ],
            [
                'title' => 'create_professor',
                'label' => 'ایجاد اساتید',
                'slug' => 'create_professor'
            ],
            [
                'title' => 'edit_professor',
                'label' => 'ویرایش اساتید',
                'slug' => 'edit_professor'
            ],
            [
                'title' => 'delete_professor',
                'label' => 'حذف اساتید',
                'slug' => 'delete_professor'
            ],
        ]);
        //         students permission
        DB::table('permissions')->insert([
            [
                'title' => 'index_student',
                'label' => 'مشاهده دانشجویان',
                'slug'  => 'index_student'
            ],
            [
                'title' => 'create_student',
                'label' => 'ایجاد دانشجویان',
                'slug'  => 'create_student'
            ],
            [
                'title' => 'edit_student',
                'label' => 'ویرایش دانشجویان',
                'slug'  => 'edit_student'
            ],
            [
                'title' => 'delete_student',
                'label' => 'حذف دانشجویان',
                'slug'  => 'delete_student'
            ],
        ]);
        //         unit permission
        DB::table('permissions')->insert([
            [
                'title' => 'index_unit',
                'label' => 'مشاهده واحدها',
                'slug'  => 'index_unit'
            ],
            [
                'title' => 'create_unit',
                'label' => 'ایجاد واحدها',
                'slug'  => 'create_unit'
            ],
            [
                'title' => 'edit_unit',
                'label' => 'ویرایش واحدها',
                'slug'  => 'edit_unit'
            ],
            [
                'title' => 'delete_unit',
                'label' => 'حذف واحدها',
                'slug'  => 'delete_unit'
            ],
        ]);
        //         ManageSelectUnit permission
        DB::table('permissions')->insert([
            [
                'title' => 'index_manage_select_unit',
                'label' => 'مشاهده فرایند مدیریت انتخاب واحد',
                'slug'  => 'index_manage_select_unit'
            ],
            [
                'title' => 'create_manage_select_unit',
                'label' => 'ایجاد فرایند مدیریت انتخاب واحد',
                'slug'  => 'create_manage_select_unit'
            ],
            [
                'title' => 'edit_manage_select_unit',
                'label' => 'ویرایش فرایند مدیریت انتخاب واحد',
                'slug'  => 'edit_manage_select_unit'
            ],
            [
                'title' => 'delete_manage_select_unit',
                'label' => 'حذف فرایند مدیریت انتخاب واحد',
                'slug' => 'delete_manage_select_unit'
            ],
        ]);
        //         selectUnit permission
        DB::table('permissions')->insert([
            [
                'title' => 'index_select_unit',
                'label' => 'مشاهده انتخاب واحد',
                'slug'  => 'index_select_unit'
            ],
            [
                'title' => 'create_select_unit',
                'label' => 'ایجاد انتخاب واحد',
                'slug'  => 'create_select_unit'
            ],
            [
                'title' => 'edit_select_unit',
                'label' => 'ویرایش انتخاب واحد',
                'slug'  => 'edit_select_unit'
            ],
            [
                'title' => 'delete_select_unit',
                'label' => 'حذف انتخاب واحد',
                'slug'  => 'delete_select_unit'
            ],
        ]);
        //         manage role permission
        DB::table('permissions')->insert([
            [
                'title' => 'index_role',
                'label' => 'مشاهده نقش ها',
                'slug'  => 'index_role'
            ],
            [
                'title' => 'create_role',
                'label' => 'ایجاد نقش ها',
                'slug'  => 'create_role'
            ],
            [
                'title' => 'edit_role',
                'label' => 'ویرایش نقش ها',
                'slug'  => 'edit_role'
            ],
            [
                'title' => 'delete_role',
                'label' => 'حذف نقش ها',
                'slug'  => 'delete_role'
            ],
        ]);
    }
}
