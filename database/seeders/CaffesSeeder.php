<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaffesSeeder extends Seeder
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
            DB::table('caffes')->insert([
                'title' => $faker->text(30),
                'name' => $faker->text(30),
                'address' => $faker->text(30),
                'phone' => $faker->numberBetween(11111,99999),
                'status' => '0',
                'user_id' => '1',

                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        }
    }
}
