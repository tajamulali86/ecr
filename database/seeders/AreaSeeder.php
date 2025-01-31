<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

$b1 =[
    'Basvakalyan',
    'Humbabad',
    'Bhalki & Husloor',
    'Kamalnagar',
    'Aurad',
    'Chittguppa',
    'Chincholli',
];

$h2 =[
    'Hyderbabad Local',
    'Chevalla'

    ];

    $g3=[


    'Shahpur',
    'Surpur',
    'Jewargi',
    'Aland',
    'Yadgir',
    'Gurmitkal',
    'Shahbad Wadi',
    'Saidapur',
    ];
    $r4=[

    'Raichur Local',
    'Sirwar',
    'Lingsugur',
    'Hatti',
    'Yergera',
    'Manvi',
    'Sindhnoor',
    'Maski',
    'Deodurga',
    ];
        foreach($b1 as $b){
            Area::create(['name' => $b,'region_id'=>'1']);
        }
        foreach($h2 as $b){
            Area::create(['name' => $b,'region_id'=>'2']);
        }
        foreach($g3 as $b){
            Area::create(['name' => $b,'region_id'=>'3']);
        }
        foreach($r4 as $b){
            Area::create(['name' => $b,'region_id'=>'4']);
        }
    }
}

/*


[2:49 PM, 1/29/2025] Faizan Bhai Dad Sasural: Gulbarga HQ

[2:54 PM, 1/29/2025] Faizan Bhai Dad Sasural: Bidar HQ

1.Basvakalyan
2.Humbabad
3.Bhalki & Husloor
4.Kamalnagar
5.Aurad
6.Chittguppa
7.Chincholli
[2:55 PM, 1/29/2025] Faizan Bhai Dad Sasural: Hyderabad HQ


*/

