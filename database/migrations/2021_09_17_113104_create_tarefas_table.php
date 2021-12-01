<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_projeto');
            $table->unsignedBigInteger('id_prioridade');
            $table->unsignedBigInteger('id_status');
            $table->string('nome', 150);
            $table->text('descricao')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
            $table->boolean('faturada');
            $table->timestamps();
            $table->foreign('id_projeto')->references('id')->on('projetos');
            $table->foreign('id_prioridade')->references('id')->on('tarefas_prioridades');
            $table->foreign('id_status')->references('id')->on('tarefas_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
