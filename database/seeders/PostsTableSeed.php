<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Post;
class PostsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i <10000 ; $i++) { 
            Post::create([
                'title' => $faker->title,
                'body' => $faker->text,
                'author' => $faker->name
            ]);
        }
    }
}
