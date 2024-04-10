<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Laptop;
use Carbon\Factory;
class SpecificLaptopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 11; $i++) {
            Laptop::create([
                'Cpu'=> $faker->sentence(4,true),
                'Gpu'=> $faker->sentence(4,true),
                'Ram'=> $faker->sentence(4,true),
                'Ssd'=> $faker->sentence(4,true),
                'Screen'=> $faker->sentence(4,true),
                'Pin'=> $faker->sentence(4,true),
                'Os'=> $faker->sentence(4,true),
                'Material'=> $faker->sentence(4,true),
                'Weight'=> $faker->sentence(4,true),
                'ProductID'=>$i+1
            ]);
        }
    }
}
