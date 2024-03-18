<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoColaborador extends Model
{
    use HasFactory;

    protected $fillable = ['cargo_id', 'colaborador_id', 'nota_desempenho'];

    protected $table = 'cargo_colaborador';
}
