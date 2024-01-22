<?php
// app/Models/EquipoUser.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoUser extends Model
{
    use HasFactory;
    protected $table = 'equipo_user';

    protected $fillable = ['equipo_id', 'user_id', 'fecha_asignacion'];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}