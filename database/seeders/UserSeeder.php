<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $data = [
            "name" => "Leandro Clayton Pivovarsky",
            "email" => "leandroclaytonp@gmail.com",
            "login" => "admin123",
            "password" => Hash::make('admin123'),
            "email_verified_at" => Carbon::now()->toDateTime(),
            "role_id" => "1"
        ];
    }
}
