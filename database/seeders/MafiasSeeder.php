<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MafiasSeeder extends Seeder
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
            DB::table('mafias')->insert([
                'title' => $faker->text(30),
                'description' => $faker->text(30),
                'status' =>'0',
                'price' => $faker->numberBetween(10,100),
                'avatar' => $faker->text(30),
                'member' => $faker->numberBetween(10,100),
                'time' => $faker->time(),
                'movie' => $faker->text(30),
                'slug' => $faker->text(30),
                'user_id' => '1',
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        }
    }
}
