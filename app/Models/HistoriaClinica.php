<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    use HasFactory;

    protected $table = "historiaclinica";

    protected $fillable = [
        'antecedentes_medicos',
        'indicaciones_medicas',
        'diagnostico_medico',
        'examenes_medicos',
        'alergias',
        'afiliacion',
        "cie",
        "doctor_id",
        "paciente_id"
    ];

    //Relacion entre entidades
    public function doctor(){
        return $this->belongsTo(User::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

}
