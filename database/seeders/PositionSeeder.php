<?php

namespace Database\Seeders;

use App\Models\Admin\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::query()->insert([
            [
                'title' => 'استاد یار',
                'slug' => 'assistant Professor'
            ],
            [
                'title' => 'استاد',
                'slug' => 'professor'
            ],
            [
                'title' => 'دانشیار',
                'slug' => 'associate Professor'
            ],
        ]);
    }
}
