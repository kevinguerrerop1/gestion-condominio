<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquilinosTable extends Migration
{
    public function up()
    {
        Schema::create('inquilinos', function (Blueprint $table) {

            $table->id();

            $table->foreignId('block_id')
                ->constrained('blocks')
                ->onDelete('cascade');

            $table->string('nombre');

            $table->string('rut')->nullable();

            $table->string('telefono')->nullable();

            $table->string('email')->nullable();

            $table->string('departamento')->nullable();

            $table->date('fecha_ingreso')->nullable();

            $table->date('fecha_salida')->nullable();

            $table->enum('estado', [
                'activo',
                'retirado'
            ])->default('activo');

            $table->text('observacion')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inquilinos');
    }
}
