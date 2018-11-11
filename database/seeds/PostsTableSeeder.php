<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts =
            [
                [
                    'user_id'=> 1,
                    'category_id' => 1,
                    'slug' => 'sample-post-1',
                    'title' => 'Sample Post 1',
                    'body' => '
                            <p>Belajara Laravel </p>
                            <h2>header level 2</h2>
                            <ol> 
                                <li>Jakarta</li>
                                <li>Cilacap</li>
                                <li>Purwokert</li>   
                            </ol>
                        <p>
                         lorem gipsum lorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsu
                         lorem gipsum lorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsum
                         lorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsum
                         lorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsum
                         </p> 

                    '
                    'status' => 1,
                    'featured' => '/images/featured-images.jpg',
                    'published_at' => '2018-07-13 00-00-00'

                ],
                [
                    'user_id'=> 1,
                    'category_id' => 1,
                    'slug' => 'sample-post 2',
                    'title' => 'Sample Post 2',
                    'body' => '
                            <p>Belajara Laravel 2 </p>
                            <h2>header level 2</h2>
                            <ol> 
                                <li>oke</li>
                                <li>Cilacap</li>
                                <li>Purwokert</li>   
                            </ol>
                        <p>
                         lorem gipsum lorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsu
                         lorem gipsum lorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsum
                         lorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsum
                         lorem gipsumlorem gipsumlorem gipsumlorem gipsumlorem gipsum
                         </p> 

                    '
                    'status' => 1,
                    'featured' => '/images/featured-images.jpg',
                    'published_at' => '2018-07-13 00-00-00'

                ],
            ];
        DB::table('posts')->insert($posts);
    }
}
