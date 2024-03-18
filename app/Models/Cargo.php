<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = ['cargo'];

    public function colaboradores()
    {
        return $this->belongsToMany(Colaborador::class, 'cargo_colaborador', 'cargo_id', 'colaborador_id')
                    ->withPivot('nota_desempenho');
    }

    protected $table = 'cargos';
}
