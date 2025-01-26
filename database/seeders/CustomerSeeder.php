<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i=1;$i<20;$i++){
            Customer::create(['name' => fake()->name(),'user_id'=>random_int(2,7),'type'=>rand(1,3),'region_id'=>rand(1,4)]);
        }
    }
}
