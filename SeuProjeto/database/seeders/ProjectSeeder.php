<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Projeto 1
            [
                'client_id' => 1, // ID do cliente A
                'title' => 'Projeto Alpha',
                'description' => 'Descrição do projeto Alpha.',
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
            ],
            // Projeto 2
            [
                'client_id' => 2, // ID do cliente B
                'title' => 'Projeto Beta',
                'description' => 'Descrição do projeto Beta.',
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
            ],
        ];
        DB::table('projects')->insert($data);
    }
}
