<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServrxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servrxes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('id_paciente');
            $table->longText('rx_rutaImagen')->nullable();
            $table->longText('rx_descripcion')->nullable();
            $table->string('rx_factura',100)->nullable();
            $table->longText('rx_medicoTratante')->nullable();

            $table->integer('ca_usu_cod')->nullable();
            $table->string('ca_tipo',10)->nullable();
            $table->dateTime('ca_fecha')->nullable();
            $table->integer('ca_estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servrxes');
    }
}
