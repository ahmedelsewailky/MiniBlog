<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => 'MiniBlog',
            'site_logo' => '/website/images/logo.png',
            'site_slogin' => '',
            'site_url' => 'localhost:8000/',
            'site_email' => 'ahmed.elsewailky@gmail.com',
            'site_copyright' => 'Copyright © 2021 All rights reserved - MiniBlog ',
            'site_location' => 'Egypt, Cairo',
            'site_social' => [
                'facebook' => 'https://facebook.com/ahmedelsewailky',
                'twitter' => 'https://twitter.com/elsewailky',
                'instagram' => 'https://instagram.com/ahmedelsewailky'
            ],
            'site_description' => 'Molestias cumque aperiam qui non eum eligendi. Reprehenderit voluptatum sed architecto quo sint a. Molestias occaecati iste sit dolores dolor aliquid. Minus aut voluptas sed delectus dolorem quam soluta. Sint veritatis ab sit ducimus illum. At corporis delectus consequuntur qui magnam tempora. Qui maxime porro ex rerum ea deleniti praesentium nobis. Ea possimus necessitatibus sit aliquid optio laborum at. Non laborum illum necessitatibus doloribus incidunt enim temporibus. Adipisci sed enim laudantium sint tempore. Voluptas voluptatem aut debitis rem.',
        ]);
    }
}
