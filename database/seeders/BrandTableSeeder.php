<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Brand;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker= Faker::create();
        for( $i= 0; $i < 5; $i++ ) {
            Brand::create([
                // "BrandID"=>$i+1,
                "Name"=> $faker->name
            ]);
        }
    }
}
