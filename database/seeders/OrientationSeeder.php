<?php

namespace Database\Seeders;

use App\Models\Admin\Major;
use App\Models\Admin\Orientation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrientationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_elc = Major::query()->where('title', 'مهندسی برق')->first()->id;
        $major_com = Major::query()->where('title', 'مهندسی کامپیوتر')->first()->id;
//        $major_agr = Major::query()->where('title', 'مهندسی کشاورزی')->first()->id;
//        $major_ind = Major::query()->where('title', 'مهندسی صنایع')->first()->id;
        Orientation::query()->insert([
            // elc orientation
            [
                'major_id' => $major_elc,
                'title' => 'مخابرات',
                'slug'  => 'Telecommunications'
            ],
            [
                'major_id' => $major_elc,
                'title' => 'الکرتونیک',
                'slug'  => 'electronic'
            ],
            [
                'major_id' => $major_elc,
                'title' => 'سیستم',
                'slug'  => 'system'
            ],
            [
                'major_id' => $major_elc,
                'title' => 'قدرت',
                'slug'  => 'power'
            ],
            // com orientation
            [
                'major_id' => $major_com,
                'title' => 'نرم افزار',
                'slug'  => 'software'
            ],
            [
                'major_id' => $major_com,
                'title' => 'هوش مصنوعی',
                'slug'  => 'ai'
            ],
            [
                'major_id' => $major_com,
                'title' => 'رایانش امن',
                'slug'  => 'security'
            ],
            [
                'major_id' => $major_com,
                'title' => 'شبکه',
                'slug'  => 'network'
            ],

        ]);
    }
}
