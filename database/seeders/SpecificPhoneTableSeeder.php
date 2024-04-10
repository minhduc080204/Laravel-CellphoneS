<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Phone;
use Carbon\Factory;

class SpecificPhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 11; $i++) {
            Phone::create([
                'Screen'=> $faker->sentence(3, true),
                'Camera'=> $faker->sentence(3, true),
                'Cpu'=> $faker->sentence(3, true),
                'Ram'=> $faker->sentence(3, true),
                'Ssd'=> $faker->sentence(3, true),
                'Pin'=> $faker->sentence(3, true),
                'Os'=> $faker->sentence(3, true),
                'Material'=> $faker->sentence(3, true),
                'Weight'=> $faker->sentence(3, true),
                'ProductID'=>$i+1
            ]);
        }
    }
}
