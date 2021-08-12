<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;




class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= \Faker\Factory::create();
       foreach (range(1 ,100) as $item){
           DB::table('posts')->insert([
               'title' => $faker->text(30),
               'body' => $faker->text(30),
               'pic' => $faker->text(30),
               'status' => 0,
               'slug' => $faker->text(30),
               'user_id' => '1',
               'created_at'=> now(),
               'updated_at'=> now(),
           ]);
       }
    }
}
