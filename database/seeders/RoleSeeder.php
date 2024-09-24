<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void {
        
        $data = [
            ["name" => "ADMIN"],
            ["nome" => "WORKER"],
            ["nome" => "CLIENT"],
        ];
        DB::table('roles')->insert($data);
    }
}
