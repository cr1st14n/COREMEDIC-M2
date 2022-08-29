<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignosvitalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signosvitales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('sv_idPaciente')->nullable();
            $table->string('sv_pa',10)->nullable();
            $table->string('sv_fc',10)->nullable();
            $table->string('sv_fr',10)->nullable();
            $table->string('sv_st',10)->nullable();
            $table->string('sv_pe',10)->nullable();
            $table->string('sv_te',10)->nullable();
            $table->string('sv_ta',10)->nullable();

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
        Schema::dropIfExists('signosvitales');
    }
}
