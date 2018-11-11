<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = 
        [
            [
                'name' => 'Admin',
                'role' => 'admin',
                'email'=> 'admin@gmail.com',
                'password' => bcrypt('password'), 
                'avatar' => '/images/user-icon.png'
            ],
            [
                'name' => 'Author',
                'role' => 'author',
                'email'=> 'author@gmail.com',
                'password' => bcrypt('password'), 
                'avatar' => '/images/user-icon.png'
            ],
        ];
            DB::table('users')->insert($users);    
        
    }
}
