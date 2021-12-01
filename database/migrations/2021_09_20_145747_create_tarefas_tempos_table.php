<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTemposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas_tempos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tarefa');
            $table->timestamp('inicio')->nullable();
            $table->timestamp('fim')->nullable();
            $table->timestamps();
            $table->foreign('id_tarefa')->references('id')->on('tarefas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas_tempos');
    }
}
