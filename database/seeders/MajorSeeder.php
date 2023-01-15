<?php

namespace Database\Seeders;

use App\Models\Admin\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Major::query()->insert([
            [
                'title' => 'مهندسی برق',
                'slug'  => 'electrical_engineering'
            ],
            [
                'title' => 'مهندسی کامپیوتر',
                'slug'  => 'computer_engineering'
            ],
            [
                'title' => 'مهندسی کشاورزی',
                'slug'  => 'agricultural_engineering'
            ],
            [
                'title' => 'مهندسی صنایع',
                'slug'  => 'industrial_engineering'
            ],
        ]);
    }
}
