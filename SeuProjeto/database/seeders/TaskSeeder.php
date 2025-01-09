<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Tarefa 1
            [
                'project_id' => 1, // ID do projeto Alpha
                'user_id' => 2,    // ID do Worker
                'title' => 'Tarefa 1 - Setup',
                'description' => 'Configuração inicial do projeto.',
                'status' => 1,  // Status: 1 - Em andamento
                'start_date' => now(),
                'end_date' => now()->addDay(),
            ],
            // Tarefa 2
            [
                'project_id' => 1, // ID do projeto Alpha
                'user_id' => 2,    // ID do Worker
                'title' => 'Tarefa 2 - Desenvolvimento',
                'description' => 'Desenvolvimento da funcionalidade X.',
                'status' => 0,  // Status: 0 - Pendente
                'start_date' => now(),
                'end_date' => now()->addDays(2),
            ],
            // Tarefa 3
            [
                'project_id' => 2, // ID do projeto Beta
                'user_id' => 2,    // ID do Worker
                'title' => 'Tarefa 1 - Planejamento',
                'description' => 'Planejamento inicial do projeto.',
                'status' => 1,  // Status: 1 - Em andamento
                'start_date' => now(),
                'end_date' => now()->addDays(3),
            ],
        ];
        DB::table('tasks')->insert($data);
    }
}
