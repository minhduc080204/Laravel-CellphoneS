<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\ProductCate;
use GuzzleHttp\Promise\Create;

class ProductCateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::Create();
        for ($i= 0; $i < 5; $i++) {
            ProductCate::create([
                "Name"=> $faker->name,
                "SeoTitle"=>$faker->sentence(5, true),
                "Status"=>1,
                "Sort"=>$i+1,
                "ParentID"=>$i+1
            ]);
        }
    }
}
