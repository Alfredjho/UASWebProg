<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class VegetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('vegetables')->insert([
                'name' => 'Vegetable ' .  $index, // Ganti dengan atribut sesuai kebutuhan Anda
                'price' => $faker->randomNumber(6), 
                'info' => $faker->sentence,
                'image' => 'img/vegetable.jpg' ,
            ]);
        }

    }
}
