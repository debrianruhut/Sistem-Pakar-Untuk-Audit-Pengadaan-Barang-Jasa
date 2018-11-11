<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings =
        [
            
                'title' => 'blogs',
                'tagline' => 'simple banget',
                'email' => 'blogs@gamil.com',
                'phone' => '+62  8888888',
                'address' => 'jatibening',
                'so_facebook' => 'http://facebook.com/blogs',
                'so_twitter' => 'http://twittr/blogs',
                'so_instagram' => 'http://instagram'    
       
        ];
        DB::table('settings')->insert($settings);
  }
}
