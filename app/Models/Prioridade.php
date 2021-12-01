<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridade extends Model
{
    use HasFactory;

    protected $table = 'tarefas_prioridades';

    protected $fillable = ['nome', 'class'];

}
