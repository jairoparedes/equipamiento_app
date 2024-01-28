<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_equipo_user_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoUserTable extends Migration
{
    public function up()
    {
        Schema::create('equipo_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->constrained('equipos');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('ubicacion_id')->constrained('ubicaciones');
            $table->date('fecha_asignacion');
            $table->timestamps(); // Opcional, para registro de creación/edición
            $table->foreignId('created_or_updated_by')->nullable()->constrained('users')->onDelete('set null');

        });
    }

    public function down()
    {
        Schema::dropIfExists('equipo_user');
    }
}
