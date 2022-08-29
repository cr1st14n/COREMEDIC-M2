<?php

namespace App\Http\Controllers;

use App\descargoMedico;
use App\descargoMedicoCont;
use App\pacientes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class descargoMedicoController extends Controller
{
    public function make(Request $request)
    {
        $tipo=$request->input('tipo');
        $paciente=pacientes::where('pa_id',$request->input('paciente'))->first();
        return view('ProceMedicos.descargoQuirurgico',compact('paciente'))->with('tipo',$tipo);
    }
    public function store(Request $request)
    {
        // return $request;
        $newDm= new descargoMedico();
        $newDm->id_paciente = $request->input('idpacienteCreateDesMed');
        $newDm->dm_area = $request->input('areaProcedimiento');
        // $newDm->dm_estado = ;
        // $newDm->dm_fechaCotizado = $request->input('');
        // $newDm->dm_costo = $request->input('');
        // $newDm->dm_observacion = $request->input('');

        $newDm->dm_fecha = $request->input('dmFecha');
        $newDm->dm_diagnostico = $request->input('dmDiagnostico');
        $newDm->dm_operacion = $request->input('dmOperacion');
        $newDm->dm_horaInicio = $request->input('dmHoraInicio');
        $newDm->dm_horaFin = $request->input('dmHoraCulminacion');
        $newDm->dm_duracion = $request->input('dmDuracion');
        $newDm->dm_cirujano = $request->input('dmCirujano');
        $newDm->dm_anesteseologo = $request->input('dmAnesteseologo');
        $newDm->dm_instrumentador = $request->input('dmInstrumentador');
        $newDm->dm_circulante = $request->input('dmCirculante');
        $newDm->ca_usu_cod = Auth::user()->usu_ci;
        $newDm->ca_tipo = 'create';
        $newDm->ca_fecha = Carbon::now();
        $newDm->ca_estado = 1;
        $res=$newDm->save();
        if ($res) {
            return ['idDM'=>$newDm->id,
                    'idPaciente'=>$newDm->id_paciente,
                    'dm_area'=>$newDm->dm_area];
        } else {
            return '0';
        }
        
        

    }
}
