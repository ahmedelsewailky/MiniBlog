<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'ahmed',
            'email' => 'ahmed@yahoo.com',
            'password' => bcrypt('123456'),
            'bio' => 'Ahmed mohammed sayed, lorem ipsum dollar is a dummy text for testing',
            'image' => 'https://pbs.twimg.com/media/ElczV6cXIAAmZl5.jpg',
            'social' => [
                'facebook' => 'https://facebook.com/ahmedelsewailky',
                'twitter' => 'https://twitter.com/elsewailky',
                'youtube' => 'https://youtube.com/ahmedelsewailky'
            ],
            'mobile' => '01234567890',
            'address' => 'Egypt, Cairo',
            'salary' => '2500',
            'fname' => 'Ahmed',
            'lname' => 'Elsewailky',
        ]);

        $role = Role::create(['name' => 'Owner']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        
    }
}
