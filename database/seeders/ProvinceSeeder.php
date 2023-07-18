<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            [
                'name' => 'Province 1',
            ],
            [
                'name' => 'Province 2',
            ],
            [
                'name' => 'Bagmati Province',
            ],
            [
                'name' => 'Gandaki Province',
            ],
            [
                'name' => 'Lumbini Province',
            ],
            [
                'name' => 'Karnali Province',
            ],
            [
                'name' => 'Sudurpashchim Province',
            ],
        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }
    }

}
