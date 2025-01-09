<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // LEANDRAO
            [
                'role_id' => 1, // Role ID do ADMIN
                'name' => 'Leandro Clayton Pivovarsky',
                'email' => 'leandroclaytonp@gmail.com',
                'login' => 'adminuuario',
                'password' => Hash::make('admin123'),
            ],
            
            // ADMIN
            [
                'role_id' => 1, // Role ID do ADMIN
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'login' => 'adminuser',
                'password' => Hash::make('adminpassword'),
            ],
            // WORKER
            [
                'role_id' => 2, // Role ID do WORKER
                'name' => 'Worker User',
                'email' => 'worker@example.com',
                'login' => 'workeruser',
                'password' => Hash::make('workerpassword'),
            ],
            // CLIENT
            [
                'role_id' => 3, // Role ID do CLIENT
                'name' => 'Client User',
                'email' => 'client@example.com',
                'login' => 'clientuser',
                'password' => Hash::make('clientpassword'),
            ],
        ];
        DB::table('users')->insert($data);
        
    }
}
