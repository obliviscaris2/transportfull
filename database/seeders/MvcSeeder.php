<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mvc;

class MvcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mvc::create([
            'title' => 'Vision',
            'slug' => 'vision',
            'image' => '',
            'description' => ''
        ]);
        Mvc::create([
            'title' => 'Goal',
            'slug' => 'goal',
            'image' => '',
            'description' => ''
        ]);
        Mvc::create([
            'title' => 'Values',
            'slug' => 'values',
            'image' => '',
            'description' => ''
        ]);
        Mvc::create([
            'title' => 'Mission',
            'slug' => 'mission',
            'image' => '',
            'description' => ''
        ]);

        
    }

}
