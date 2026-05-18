<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('condominio_id')
                ->constrained('condominios')
                ->onDelete('cascade');

            $table->string('nombre');

            $table->integer('pisos')->nullable();

            $table->integer('cantidad_departamentos')->nullable();

            $table->text('observacion')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blocks');
    }
}
