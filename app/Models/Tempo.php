<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempo extends Model
{
    use HasFactory;

    protected $table = "tarefas_tempos";

    protected $fillable = ['id_tarefa', 'inicio', 'fim'];

}
