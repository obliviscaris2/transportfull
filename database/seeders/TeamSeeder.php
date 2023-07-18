<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team')->insert([
            [
                'name' => 'Pawan Karki',
                'position' => 'Chief',
                'role' => 'Chief',
                'image'=> 'uploads/team/ramakant.jpg',
                'email' => 'pawanarki@gmail.com',
                'contact_number' => '9851223130',
            ],
           

        ]);
    }
}
