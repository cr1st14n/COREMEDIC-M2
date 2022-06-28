<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetarioMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetario_m_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('id_consulta')->nullable();
            $table->integer('id_usuMed');
            $table->integer('id_Paciente');
            $table->string('rm_Contenido')->nullable();
            
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
        Schema::dropIfExists('recetario_m_s');
    }
}
