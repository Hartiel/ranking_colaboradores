<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf', 'email', 'unidade_id'];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'unidade_id');
    }

    public function cargo()
    {
        return $this->belongsToMany(Cargo::class, 'cargo_colaborador', 'colaborador_id', 'cargo_id')
                    ->withPivot('nota_desempenho');
    }

    protected $table = 'colaboradores';
}
