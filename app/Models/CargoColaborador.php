<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoColaborador extends Model
{
    use HasFactory;
    protected $table = 'cargo_colaboradores';
    protected $fillable = ['colaborador_id', 'cargo_id', 'nota_desempenho'];

    public function colaborador(){
        return $this->belongsTo(Colaborador::class);
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }
}
