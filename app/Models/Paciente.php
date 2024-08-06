<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Paciente extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable, HasRoles;

    protected $table = "pacientes";

    protected $fillable = [
        'name',
        'surname',
        'gender',
        "dni",
        'address',
        'phone', 
        'email', 
        'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relaciones entre entidades
    public function historiaClinica(){
        return $this->hasMany(HistoriaClinica::class);
    }


}
