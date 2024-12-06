<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            "name"=>"Satish Dishaye",
            "email"=>"satishdishaye952@gmail.com",
            "password"=>Hash::make("12345678"),
            "status"=>1,
            

            
        ]);
    }
}
