<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_medicas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('id_paciente')->nullable();
            $table->string('id_medico')->nullable();
            $table->longText('om_texto')->nullable();
            $table->longText('om_otrotext')->nullable();

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
        Schema::dropIfExists('orden_medicas');
    }
}
