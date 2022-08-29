<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescargoMedicoContsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descargo_medico_conts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('id_descMed');
            $table->integer('id_descItem');
            $table->string('dmc_cantidad')->nullable();
            
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
        Schema::dropIfExists('descargo_medico_conts');
    }
}
