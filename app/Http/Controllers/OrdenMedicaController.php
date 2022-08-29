<?php

namespace App\Http\Controllers;

use App\ordenMedica;
use App\pacientes;
use App\User;
use PDF;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCode;


class OrdenMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_1(Request $request)
    {
        return ordenMedica::where('id_paciente', $request->paciente)
            ->join('users as u', 'u.id', 'id_medico')
            ->select('orden_medicas.*', 'u.usu_nombre', 'u.usu_appaterno')
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_1()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_1(Request $request)
    {
        $n = new ordenMedica();
        $n->id_paciente = $request->input('paci');
        $n->om_texto = $request->input('data');
        $n->om_otrotext = $request->input('diag');
        $n->id_medico = Auth::user()->id;

        $n->ca_usu_cod = Auth::user()->id;
        $n->ca_tipo = 'create';
        $n->ca_fecha = Carbon::now();
        $n->ca_estado = '1';
        $res = $n->save();
        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ordenMedica  $ordenMedica
     * @return \Illuminate\Http\Response
     */
    public function showPDF($id)
    {
        // return $data;
        $a = array();
        $a = [1, 2, 3, 4, 5, 6, 7, 8];
        $a = implode(",", $a);
        // return $a;
        // return $id;
        $datos = ordenMedica::where('id', $id)->first();
        $medico = User::where('id', $datos['id_medico'])->select('usu_nombre', 'usu_appaterno', 'usu_apmaterno','usu_telf')->first();
        // $medic=unserialize($datos['rm_Contenido']);

        // return $medic;


        $Paciente = pacientes::where('pa_id', $datos['id_paciente'])->select('pa_id', 'pa_nombre', 'pa_appaterno', 'pa_apmaterno', 'pa_fechnac')->first();
        $Paciente1 = '' . $Paciente['pa_nombre'] . ' ' . $Paciente['pa_appaterno'] . '  ' . $Paciente['pa_apmaterno'] . '';
        // return $medic;
        $edad= Carbon::createFromDate($Paciente->pa_fechnac)->age;
        $Qr= QrCode::generate($datos);


        $dompdf = PDF::loadView('ordenMedica.ordenMedica_a', ["medico" => $medico, 
        "paciente1" => $Paciente1,
        "paciente" => $Paciente,
         'data' => $datos,
         'edad' => $edad,
         'QR'=>$Qr
        ]);
        $dompdf->setPaper(array(0, 0, 448.074, 585.387), 'landscape');
        return $dompdf->stream('invoice.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ordenMedica  $ordenMedica
     * @return \Illuminate\Http\Response
     */
    public function edit(ordenMedica $ordenMedica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ordenMedica  $ordenMedica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ordenMedica $ordenMedica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ordenMedica  $ordenMedica
     * @return \Illuminate\Http\Response
     */
    public function destroy(ordenMedica $ordenMedica)
    {
        //
    }
}
