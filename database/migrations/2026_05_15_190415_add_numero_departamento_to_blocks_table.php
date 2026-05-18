<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumeroDepartamentoToBlocksTable extends Migration
{
    public function up()
    {
        Schema::table('blocks', function (Blueprint $table) {

            $table->string('numero_departamento')
                ->nullable()
                ->after('pisos');
        });
    }

    public function down()
    {
        Schema::table('blocks', function (Blueprint $table) {

            $table->dropColumn('numero_departamento');
        });
    }
}
