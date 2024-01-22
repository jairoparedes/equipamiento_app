<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_equipos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('n_serie')->unique();
            $table->timestamps(); // Opcional, si quieres llevar registro de creación/edición
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
