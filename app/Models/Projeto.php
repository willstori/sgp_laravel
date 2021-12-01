<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'id_cliente', 'id_etapa', 'data_inicio', 'data_fim'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }

    public function etapa()
    {
        return $this->belongsTo(Etapa::class, 'id_etapa', 'id');
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'id_projeto', 'id');
    }
}
