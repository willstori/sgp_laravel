<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefas_prioridades')->insert([
            'nome' => 'Crítico',
            'class' => 'dark'
        ]);

        DB::table('tarefas_prioridades')->insert([
            'nome' => 'Urgente',
            'class' => 'danger'
        ]);

        DB::table('tarefas_prioridades')->insert([
            'nome' => 'Alta',
            'class' => 'warning'
        ]);

        DB::table('tarefas_prioridades')->insert([
            'nome' => 'Média',
            'class' => 'primary'
        ]);

        DB::table('tarefas_prioridades')->insert([
            'nome' => 'Baixa',
            'class' => 'success'
        ]);
    }
}
