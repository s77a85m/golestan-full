<?php

namespace Database\Seeders;

use App\Models\Admin\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::query()->insert([
            [
                'title' => 'کارشناسی',
                'slug' => 'master'
            ],
            [
                'title' => 'کارشناسی ارشد',
                'slug' => 'senior'
            ],
            [
                'title' => 'دکتری',
                'slug' => 'Phd'
            ],
        ]);
    }
}
