<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'whatsapp', 'estado', 'cidade', 'endereco'];

    public function projetos()
    {
        return $this->hasMany(Projeto::class, 'id_projeto', 'id');
    }
}
