<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cons_clinicas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            $table->string('id_paciente')->nullable();
            $table->string('cc_diagnostico')->nullable();
            $table->string('cc_motivo')->nullable();
            $table->longText('cc_data')->nullable();


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
        Schema::dropIfExists('cons_clinicas');
    }
}
