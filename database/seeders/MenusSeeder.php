<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusSeeder extends Seeder
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
            DB::table('menus')->insert([
                'product' => $faker->text(30),
                'caffe_id' => '1',
                'product_discretion' => $faker->text(30),
                'product_pic' => $faker->text(30),
                'image' => $faker->image(),
                'price' => $faker->numberBetween(12500,98452),
                'status' => '0',
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        }
    }
}
