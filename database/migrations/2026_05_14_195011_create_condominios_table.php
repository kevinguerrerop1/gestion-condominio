<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondominiosTable extends Migration
{
    public function up()
    {
        Schema::create('condominios', function (Blueprint $table) {

            $table->id();

            $table->string('nombre');

            $table->string('direccion')->nullable();

            $table->string('telefono')->nullable();

            $table->string('email')->nullable();

            $table->text('observacion')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('condominios');
    }
}
