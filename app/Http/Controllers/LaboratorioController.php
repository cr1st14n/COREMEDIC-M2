<?php

namespace App\Http\Controllers;

use App\laboratorio;
use App\pacientes;
use Carbon\Carbon;
use Dompdf\Dompdf;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\PDF as PDF;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

use function Opis\Closure\unserialize;

class LaboratorioController extends Controller
{

    public function storeLab(Request $request)
    {
        $new = new laboratorio();
        $new->id_paciente = $request['a']['paciente'];
        $new->lab_respaldo = $request['a']['respaldo'];
        $new->lab_tipoPago = $request['a']['tipoDePago'];
        $new->lab_medTratante = $request['a']['medicoTratante'];
        $new->lab_data = serialize($request['b']);
        
        $new->ca_usu_cod = Auth::user()->id;
        $new->ca_tipo = 'created';
        $new->ca_fecha = Carbon::now();
        $new->ca_estado = 1;

        $n = $new->save();
        return ["estR" => $n, "idR" => $new->id];
    }

    public function showHistLabPaci(Request $request)
    {
        $co = (unserialize(laboratorio::where('id_paciente', $request->paciente)->value('lab_data')))['0']['data'];

        $cat = laboratorio::where('id_paciente', $request->paciente)
            //  ->selectRaw(unserialize('laboratorios.lab_data'),'as data')
            //  ->addSelect('laboratorios.*')
            ->get();
        $data = 0;
        $cadena = array();
        foreach ($cat as $key => $value) {
            $data = unserialize($value['lab_data']);
            array_push($cadena, ['lab' => $value, 'cont' => $data]);
        }
        return $cadena;
    }

     public function uno(Request $request)
    {
        return $request;
    }

    public function showPdfPaciente($res, Request $request)
    {


        $data = laboratorio::where('id', $res)->first();
        $bu= unserialize( $data['lab_data']);
        
        // return unserialize();
        // return LaboratorioController::uno($bu[0]['dataTa']);
        
        $paciente = pacientes::where('pa_id', $data['id_paciente'])->first();
        $datoPago = "";
        if ($data['lab_tipoPago'] == '1') {
            $datoPago = 'Facturado: # ' . $data['lab_respaldo'];
        } elseif ($data['lab_tipoPago'] == '2') {
            $datoPago = 'Autorizado por: ' . $data['lab_respaldo'];
        }
        $lbs = unserialize($data['lab_data']);
        $da = ["nombre" => 3];

        $html2 = view('laboratorio.labViewPdf', [
            "da" => $da, "pa" => $paciente, "dp" => $datoPago, "lbs" => $lbs, "ID" => $data['id'], "medTra" => $data['lab_medTratante']
        ]);
        
        // return $lbs[0]['tipo'];
        // return \array_search('2',$lbs);
        // return $lab[0]['data'][1]['name'];
        // return $html2;
        $pdf = App::make('dompdf.wrapper');
        // $pdf->setPaper('A5', 'portrait');
        $pdf->setPaper(array(0,0,396.85,612.2835), 'portrait');
        $pdf->loadHTML($html2);
        return $pdf->stream();
    }

    public function edit(laboratorio $laboratorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laboratorio $laboratorio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(laboratorio $laboratorio)
    {
        //
    }
}
