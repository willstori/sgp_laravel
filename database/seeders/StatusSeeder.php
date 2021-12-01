<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefas_status')->insert([
            'nome' => 'Não iniciada',
            'class' => 'primary'
        ]);

        DB::table('tarefas_status')->insert([
            'nome' => 'Em Progresso',
            'class' => 'success'
        ]);

        DB::table('tarefas_status')->insert([
            'nome' => 'Em Pausa',
            'class' => 'warning'
        ]);

        DB::table('tarefas_status')->insert([
            'nome' => 'Concluída',
            'class' => 'light'
        ]);

    }
}
