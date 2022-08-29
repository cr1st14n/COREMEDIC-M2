<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescargoMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descargo_medicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('id_paciente')->nullable();
            $table->boolean('dm_estado')->nullable();
            $table->dateTime('dm_fechaCotizado')->nullable();
            $table->float('dm_costo')->nullable();
            $table->string('dm_observacion')->nullable();
            $table->string('dm_area')->nullable();
            
            $table->string('dm_fecha')->nullable();
            $table->string('dm_diagnostico')->nullable();
            $table->string('dm_operacion')->nullable();
            $table->time('dm_horaInicio')->nullable();
            $table->time('dm_horaFin')->nullable();
            $table->integer('dm_duracion')->nullable();
            $table->string('dm_cirujano')->nullable();
            $table->string('dm_anesteseologo')->nullable();
            $table->string('dm_instrumentador')->nullable();
            $table->string('dm_circulante')->nullable();
            

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
        Schema::dropIfExists('descargo_medicos');
    }
}
