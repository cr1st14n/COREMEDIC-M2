<?php

namespace App\Http\Controllers;

use App\cotizacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return $request->input('circulante_123');
        $cot=new cotizacion();
        $cot->cod_cot=cotizacion::max('cod_cot')+1 ;
        $cot->cot_id_paciente=$request->input('id_paciente_new_cotizacion');
        $cot->cot_EspecialidadCirugia=$request->input('EspecialidadMedica');
        $cot->cot_tipoCirugia=$request->input('nombreCirugia');
        $cot->cot_tiempoAproximado=$request->input('tiempoAproximado');
        $cot->cot_cirujanoHonorarios=$request->input('cirujanoHonorarios');
        $cot->cot_espAneesteseologo=$request->input('anesteseologo');
        $cot->cot_quirofanoMayor=$request->input('quirofano_mayor');
        $cot->cot_salaEndoscopia=$request->input('sala_endoscopia');
        $cot->cot_salaPartos=$request->input('sala_partos');
        $cot->cot_equipoLaparosopica=$request->input('equipo_laparoscopia');
        $cot->cot_ayudante1=$request->input('ayudante_1');
        $cot->cot_ayudante2=$request->input('ayudante_2');
        $cot->cot_instrumentador=$request->input('instrumentador');
        $cot->cot_circulante=$request->input('circulante');
        $cot->cot_oxigeno=$request->input('oxigeno');
        $cot->cot_agujaK=$request->input('aguja_k');
        $cot->cot_insumoQuirofano=$request->input('insumos_quirofano');
        $cot->cot_medicamentosQuirofano=$request->input('medicamentos_quirofano');
        $cot->cot_otros=$request->input('otros');
        $cot->cot_procedimiento=$request->input('procedimiento');
        $cot->cot_estado=0;
        
        $cot->ca_usu_cod=Auth::user()->id;
        $cot->ca_tipo="create";
        $cot->ca_fecha=Carbon::now();
        $cot->ca_estado=1;

        $resp=$cot->save();
        return $resp;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(cotizacion $cotizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cotizacion $cotizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(cotizacion $cotizacion)
    {
        //
    }
}
