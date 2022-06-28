<?php

namespace App\Http\Controllers;

use App\consClinica;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

use function Opis\Closure\serialize;
use function Opis\Closure\unserialize;

class ConsClinicaController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($paciente, Request $request)
    {
        $data = [
            'examenFisico' => $request->input('examenFisico'),
            'tratamiento' => $request->input('tratamiento'),
            'inyectable' => $request->input('inyectable'),
            'suero' => $request->input('suero'),
            'curacionSuturas' => $request->input('curacionSuturas'),
            'otros' => $request->input('otros'),
        ];
        $cc = new consClinica();
        $cc->id_paciente = $paciente;
        $cc->cc_diagnostico = $request->input('diagnostico');
        $cc->cc_motivo = $request->input('razon');
        $cc->cc_data = serialize($data);

        $cc->ca_usu_cod = Auth::user()->id;
        $cc->ca_tipo = 'create';
        $cc->ca_fecha = Carbon::now();
        $cc->ca_estado = 1;
        return $re1s = $cc->save();
    }

    public function show($id)
    {
        return consClinica::where('id_paciente', $id)->get();
    }

    public function edit(consClinica $consClinica)
    {
        //
    }

    public function update(Request $request, consClinica $consClinica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\consClinica  $consClinica
     * @return \Illuminate\Http\Response
     */
    public function destroy(consClinica $consClinica)
    {
        //
    }

    public function showdatos($id)
    {
        $data= consClinica::where('id', $id)->first();
        $datab=unserialize($data['cc_data']);
        $data=['a'=>$data,'b'=>$datab];
        return $data;   
    }
}
