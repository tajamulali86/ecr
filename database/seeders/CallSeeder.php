<?php

namespace Database\Seeders;

use App\Models\Call;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<20;$i++){
            Call::create(['time' => fake()->time(),'date'=>fake()->date(),'customer_id'=>random_int(1,19),'employee_id'=>rand(5,8),'remarks'=>fake()->text(100)]);
        }
    }
}
