<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ahmed',
            'email' => 'ahmed@yahoo.com',
            'password' => bcrypt('123456'),
            'description' => 'Ahmed mohammed sayed, lorem ipsum dollar is a dummy text for testing',
            'image' => '/website/images/users/seeding/user-1.jpg',
            'social' => [
                'facebook' => 'https://facebook.com/ahmedelsewailky',
                'twitter' => 'https://twitter.com/elsewailky',
                'instagram' => 'https://instagram.com/ahmedelsewailky'
            ]
        ]);
        User::create([
            'name' => 'sayed',
            'email' => 'sayed@yahoo.com',
            'password' => bcrypt('123456'),
            'description' => 'Sayed naser habib, lorem ipsum dollar is a dummy text for testing',
            'image' => '/website/images/users/seeding/user-6.jpg',
            'social' => [
                'facebook' => 'https://facebook.com/sayed',
                'twitter' => 'https://twitter.com/sayed',
                'instagram' => 'https://instagram.com/sayed'
            ]
        ]);
        User::create([
            'name' => 'mostafa',
            'email' => 'mostafa@yahoo.com',
            'password' => bcrypt('123456'),
            'image' => '/website/images/users/seeding/user-2.jpg',
            'social' => [
                'facebook' => 'https://facebook.com/mostafa',
                'twitter' => 'https://twitter.com/mostafa',
                'instagram' => 'https://instagram.com/mostafa'
            ]
        ]);
        User::create([
            'name' => 'osama',
            'email' => 'osama@yahoo.com',
            'password' => bcrypt('123456'),
            'description' => 'Osama mohammed elzero, lorem ipsum dollar is a dummy text for testing',
            'image' =>
            '/website/images/users/seeding/user-5.jpg',
            'social' => [
                'facebook' => 'https://facebook.com/osama',
                'twitter' => 'https://twitter.com/osama',
                'instagram' => 'https://instagram.com/osama'
            ]
        ]);
        User::create([
            'name' => 'eman',
            'email' => 'eman@yahoo.com',
            'password' => bcrypt('123456'),
            'description' => 'Eman ahmed ibrahim, lorem ipsum dollar is a dummy text for testing',
            'image' =>
            '/website/images/users/seeding/user-4.jpg',
            'social' => [
                'facebook' => 'https://facebook.com/eman',
                'twitter' => 'https://twitter.com/eman',
                'instagram' => 'https://instagram.com/eman'
            ]
        ]);
    }
}
