<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = "pacientes";

    protected $fillable = [
        'name',
        'surname',
        'gender',
        'address',
        'phone'
    ];

    //Relaciones entre entidades
    public function historiaClinica(){
        return $this->hasMany(HistoriaClinica::class);
    }


}
