<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // ADMIN MENU       ----------------------------
            ["name" => "admin"],                    // 1
            ["name" => "admin.workers"],            // 2
            ["name" => "admin.projects"],           // 3
            ["name" => "admin.tasks"],              // 4
            ["name" => "admin.clients"],            // 5
            // WORKER MENU      ----------------------------
            ["name" => "worker"],                   // 6
            ["name" => "worker.tasks.status"],      // 7
            // CLIENT MENU      -----------------------------
            ["name" => "client"],                   //8
            ["name" => "client.projects.visualize"],//9
            ["name" => "client.tasks.visualize"]    //10

        ];
        DB::table('resources')->insert($data);
    }
}
