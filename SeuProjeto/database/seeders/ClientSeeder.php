<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Cliente 1
            [
                'user_id' => 1,  // ID do usuário (Admin)
                'name' => 'Cliente A',
                'cpf' => '123.456.789-00',
                'email' => 'clienteA@example.com',
                'password' => bcrypt('clienteApassword'),
            ],
            // Cliente 2
            [
                'user_id' => 3,  // ID do usuário (Client)
                'name' => 'Cliente B',
                'cpf' => '987.654.321-00',
                'email' => 'clienteB@example.com',
                'password' => bcrypt('clienteBpassword'),
            ],
        ];
        DB::table('clients')->insert($data);
    }
}
