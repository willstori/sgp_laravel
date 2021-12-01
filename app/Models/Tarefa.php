<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['id_projeto', 'id_prioridade', 'id_status', 'id_user', 'nome', 'descricao', 'data_inicio', 'data_fim', 'faturada'];

    /**
     * Get the projeto that owns the Tarefa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'id_projeto', 'id');
    }

    public function prioridade()
    {
        return $this->belongsTo(Prioridade::class, 'id_prioridade', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}
