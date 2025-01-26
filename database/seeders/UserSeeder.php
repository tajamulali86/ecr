<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Create 10 users with random names and email addresses
        User::create(['name'=>'Faizan', 'email'=>'info@pharbetter.com','password'=>Hash::make(123123),'role'=>'superadmin','is_active'=>true, 'region_id'=>'1']);
        User::create(['name'=>'man1', 'email'=>'man1@test.com','password'=>Hash::make(123123),'role'=>'manager','is_active'=>true, 'region_id'=>'1']);
        User::create(['name'=>'man2', 'email'=>'man2@test.com','password'=>Hash::make(123123),'role'=>'manager','is_active'=>true, 'region_id'=>'2']);
        User::create(['name'=>'man3', 'email'=>'man3@test.com','password'=>Hash::make(123123),'role'=>'manager','is_active'=>true, 'region_id'=>'3']);
        User::create(['name'=>'man4', 'email'=>'man4@test.com','password'=>Hash::make(123123),'role'=>'manager','is_active'=>false, 'region_id'=>'4']);
        User::create(['name'=>'emp1', 'email'=>'emp1@test.com','password'=>Hash::make(123123),'role'=>'employee','is_active'=>true, 'region_id'=>'1']);
        User::create(['name'=>'emp2', 'email'=>'emp2@test.com','password'=>Hash::make(123123),'role'=>'employee','is_active'=>true, 'region_id'=>'1']);
        User::create(['name'=>'emp3', 'email'=>'emp3@test.com','password'=>Hash::make(123123),'role'=>'employee','is_active'=>true, 'region_id'=>'1']);
        User::create(['name'=>'emp4', 'email'=>'emp4@test.com','password'=>Hash::make(123123),'role'=>'employee','is_active'=>false, 'region_id'=>'2']);
        User::create(['name'=>'emp5', 'email'=>'emp5@test.com','password'=>Hash::make(123123),'role'=>'employee','is_active'=>true, 'region_id'=>'3']);
        User::create(['name'=>'emp5', 'email'=>'emp6@test.com','password'=>Hash::make(123123),'role'=>'employee','is_active'=>false, 'region_id'=>'2']);
    }
}
