<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastoComunsTable extends Migration
{
    public function up()
    {
        Schema::create('gasto_comuns', function (Blueprint $table) {

            $table->id();

            $table->foreignId('inquilino_id')
                ->constrained('inquilinos')
                ->onDelete('cascade');

            $table->string('mes');

            $table->year('anio');

            $table->decimal('monto', 12, 2);

            $table->decimal('interes', 12, 2)
                ->default(0);

            $table->decimal('total', 12, 2);

            $table->date('fecha_vencimiento')
                ->nullable();

            $table->date('fecha_pago')
                ->nullable();

            $table->enum('estado', [
                'pendiente',
                'pagado',
                'vencido'
            ])->default('pendiente');

            $table->string('metodo_pago')
                ->nullable();

            $table->text('observacion')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gasto_comuns');
    }
}
