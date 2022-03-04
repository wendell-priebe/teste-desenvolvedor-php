<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20 ; $i++) {
            // https://github.com/fzaninotto/Faker
            $faker = Faker\Factory::create('pt_BR');
            //$faker->cellphonenumber
            //$faker->randomDigit
            //$faker->fileExtension
            $product = $faker->word;
            $bar_code = $faker->ean13;
            $inventory = $faker->numberBetween($min = 2, $max = 300); // 85
            $value = $faker->randomFloat($nbMaxDecimals = 2, $min = 0.1, $max = 500); // 48.8932;
            $description = $faker->text($maxNbChars = 100);

            DB::table('products')->insert([
                'id' => Str::isUuid(3),
                'product' => $product,
                'bar_code' => $bar_code,
                'inventory' => $inventory,
                'value' => $value,
                'description' =>  $description,
            ]);
        }
    }
}
