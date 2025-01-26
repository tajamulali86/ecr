<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $regions=['Bidar', 'Hyderabad','Gulbarga','Raichur'];
        foreach($regions as $region){
            Region::create(['name'=>$region]);
        }
    }
}
