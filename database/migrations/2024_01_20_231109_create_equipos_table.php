<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_equipos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('n_serie')->unique();
            $table->string('n_inventario')->unique();
            $table->foreignId('marcas_modelos_id')->constrained()->onDelete('cascade');
            $table->string('hdd');
            $table->string('ram');
            $table->string('so'); // Sistema Operativo
            $table->string('version_office');
            $table->ipAddress('ip')->nullable(); // Puede ser nulo si no se asigna IP
            $table->boolean('dameware')->default(false); // Suponiendo que es un booleano para software instalado
            $table->timestamps();
            $table->foreignId('created_or_updated_by')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
