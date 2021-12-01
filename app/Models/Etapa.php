<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function projetos()
    {
        return $this->hasMany(Projeto::class, 'id_etapa', 'id');
    }
}
