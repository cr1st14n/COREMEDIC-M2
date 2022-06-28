<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            $table->integer('cod_cot');
            $table->timestamps();

            $table->string('cot_id_paciente')->nullable();
            $table->string('cot_EspecialidadCirugia')->nullable();
            $table->string('cot_tipoCirugia')->nullable();
            $table->string('cot_tiempoAproximado')->nullable();
            $table->string('cot_cirujanoHonorarios')->nullable();
            $table->string('cot_espAneesteseologo')->nullable();
            $table->string('cot_quirofanoMayor')->nullable();
            $table->string('cot_salaEndoscopia')->nullable();
            $table->string('cot_salaPartos')->nullable();
            $table->string('cot_equipoLaparosopica')->nullable();
            $table->string('cot_ayudante1')->nullable();
            $table->string('cot_ayudante2')->nullable();
            $table->string('cot_instrumentador')->nullable();
            $table->string('cot_circulante')->nullable();
            $table->string('cot_oxigeno')->nullable();
            $table->string('cot_agujaK')->nullable();
            $table->string('cot_insumoQuirofano')->nullable();
            $table->string('cot_medicamentosQuirofano')->nullable();
            $table->string('cot_otros')->nullable();
            $table->string('cot_procedimiento')->nullable();
            
            // cotizacion
            $table->string('cot_costoProcedimiento')->nullable();
            $table->string('cot_fechaCotizacion')->nullable();

            //campos de auditoria 
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
        Schema::dropIfExists('cotizacions');
    }
}
