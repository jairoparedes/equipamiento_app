<?php
// app/Models/Equipo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['n_serie'];

    public function equipoUsers()
    {
        return $this->hasMany(EquipoUser::class);
    }
}
