<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::create([
            'govn_name' => 'Government of Nepal',
            'ministry_name' => 'Ministry of Youth and Sports',
            'department_name' => 'Ministry of Youth and Sports',
            'office_name' => 'ANTWU',
            'office_address' => 'Peris Dada, Kathmandu',
            'office_contact' => '4602758',
            'office_mail' => 'antwul56@gmail.com',
            'main_logo' => 'main_logo.png',
            'side_logo' => 'side_logo.jpg',
            'flag_logo' => 'nepal_flag.gif',
            'face_link' => 'https://www.facebook.com/',
            'insta_link' => 'https://www.instagram.com/',
            'social_link' => 'https://www.social.com/',
            'face_page' => 'https://www.facebook.com',
            // 'face_page' => 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnationalyouthcouncilnepal&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId',
            'google_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.110886592172!2d85.37060381501485!3d27.682967482802056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1bcb8584a51f%3A0x306902437b9fd83a!2sNational%20Youth%20Council%20(NYC)!5e0!3m2!1sen!2snp!4v1679309550445!5m2!1sen!2snp',
        ]);
    }
}
