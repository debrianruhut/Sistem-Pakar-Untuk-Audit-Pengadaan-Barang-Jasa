<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments =
        [
            [
            'post_id'=> 1,
                'name'=> 'nurjaman',
                'email'=> 'nurjaman@gmail.com',
                'body' => 'bagus materinya ',
                'status' => 1,             
            ],
            [
            'post_id'=> 2,
                    'name'=> 'nurjaman',
                    'email'=> 'nurjaman@gmail.com',
                    'body' => 'bagus materinya ',
                    'status' => 1,             
            ],    
        ];
        DB::table('comments')->insert($comments);
    }
}
