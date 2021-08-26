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
            'image' => '/website/images/users/seeding/user-1.jpg'
        ]);
        User::create([
            'name' => 'sayed',
            'email' => 'sayed@yahoo.com',
            'password' => bcrypt('123456'),
            'image' => '/website/images/users/seeding/user-6.jpg'
        ]);
        User::create([
            'name' => 'mostafa',
            'email' => 'mostafa@yahoo.com',
            'password' => bcrypt('123456'),
            'image' => '/website/images/users/seeding/user-2.jpg'
        ]);
        User::create([
            'name' => 'osama',
            'email' => 'osama@yahoo.com',
            'password' => bcrypt('123456'),
            'image' => '/website/images/users/seeding/user-5.jpg'
        ]);
        User::create([
            'name' => 'eman',
            'email' => 'eman@yahoo.com',
            'password' => bcrypt('123456'),
            'image' => '/website/images/users/seeding/user-4.jpg'
        ]);
    }
}
