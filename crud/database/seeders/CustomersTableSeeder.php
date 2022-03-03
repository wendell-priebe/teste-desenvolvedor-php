<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker;

use App\Models\Customers;
use Faker\Core\Number;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Customers::factory()
        //     ->count(10)
        //     ->create();

        for ($i=0; $i < 15 ; $i++) {
            // https://github.com/fzaninotto/Faker
            $faker = Faker\Factory::create('pt_BR');
            //$faker->cellphonenumber
            //$faker->randomDigit
            //$faker->fileExtension
            $name = $faker->name;
            $email = explode(" ", $name);
            $cpfSujo = $faker->cpf(false);
            //$cpf = str_replace(".", "", $cpfSujo);
            //$cpf = str_replace("-", "", $cpf);

            DB::table('customers')->insert([
                'id' => Str::isUuid(3),
                'name' => $name,
                'email' => $email[1].'@gmail.com',
                'cpf' =>  $cpfSujo,
            ]);
        }
    }
}
