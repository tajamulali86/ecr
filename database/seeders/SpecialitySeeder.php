<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialities=[ 'Ortho',
        'Neuro',
        'Cardio',
        'Pulmonology',
        'Tumor',
        'Physio',
        ];

        foreach ($specialities as $speciality) {
            Speciality::create(['name' => $speciality]);
        }
        //
    }
}


