<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Product;
use Carbon\Factory;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for( $i= 0; $i < 10; $i++ ){
            Product::create([
                "Name"=>$faker->name,
                "SeoTitle"=> $faker->sentence(6, true),
                "Status"=> 1,
                "Image"=> $faker->image,
                "Price"=>100000,
                "VAT"=>1,
                "Quantity"=>10,
                "Warranty"=>12,
                "Description"=>$faker->sentence(10, true),
                "Type"=>1,
                "Detail"=> $faker->sentence(20, true),
                "CateID"=>$i+1,
                "BrandID"=>$i+1
            ]);

        }
    }
}
