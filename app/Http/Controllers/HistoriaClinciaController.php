<?php

namespace App\Http\Controllers;

use App\atencion;
use App\citPrev;
use App\consClinica;
use App\historiaClincia;
use App\pacientes;
use App\recetarioM;
use App\signosvitales;
use App\User;
// use BaconQrCode\Encoder\QrCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCode;

class HistoriaClinciaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function showHCL(Request $request)
    {
        $paciente = pacientes::where('pa_id', $request->input('id'))->first();
        $fechnac = $paciente->pa_fechnac;
        $fechnac = Carbon::parse($fechnac)->format('d-m-Y');
        $receta = recetarioM::where('id_Paciente', $request->input('id'))
            ->join('Users as u', 'u.id', '=', 'recetario_m_s.id_usuMed')
            ->select('recetario_m_s.*')
            ->addSelect('u.usu_nombre', 'u.usu_appaterno', 'u.usu_apmaterno')
            ->get();
        $vista = view('paciente.hcl')
            ->with('paciente', $paciente)
            ->with('fechnac', $fechnac)
            ->with('receta', $receta);
        return $vista;
    }

    public function showSigVi(Request $request)
    {
        $sv = '';
        $date = '';
        $estado = '';
        $sv = signosvitales::where('sv_idPaciente', $request->input('id'))->latest('id')->first();
        if ($sv == null) {
            // return 'sin datos';
            $sv = 'sin datos';
        } else {
            $date = $sv['created_at'];
            if (Carbon::parse($date)->format('Y-m-d') == Carbon::now()->format('Y-m-d')) {
                $estado = 1;
            } else {
                $estado = 0;
            }
        }
        // return $date = Carbon::parse($date)->format('Y-m-d');
        // return $date;

        $mc = atencion::where('id', $request->input('id2'))->value('ate_descripcion');

        return ['sv' => $sv, 'date' => $date, 'estado' => $estado, 'mc' => $mc];
    }

    public function colaPacienteMedAten(Request $request)
    {
        // citPrev::join('pacientes','pacientes.pa_id','cp_paciente')
        // ->where('cp_med',17)->where('cp_estado',1)->orderBy('cp_time','asc')W
        // ->select('cit_prevs.*','pacientes.pa_nombre','pacientes.pa_appaterno')
        // ->get();
        if (Auth::user()->usu_area == 'SisMed_enf') {
            $res = atencion::where('atencion.ate_estAteMed', 0)
                // ->Where('ate_med', Auth::user()->id)
                ->Where('ate_pago', 'cancelado')
                ->whereNotIn('ate_med', [0])
                ->whereDate('atencion.created_at', Carbon::now()->format('Y-m-d'))
                ->join('pacientes as pa', 'pa.pa_id', 'atencion.pa_id')
                ->select('atencion.id', 'atencion.pa_id', 'atencion.ate_procedimiento', 'pa.pa_nombre', 'pa.pa_appaterno')->limit('10')->get();
        } else {
            $res = atencion::where('atencion.ate_estAteMed', 0)
                ->Where('ate_med', Auth::user()->id)
                ->Where('ate_pago', 'cancelado')
                ->whereDate('atencion.created_at', Carbon::now()->format('Y-m-d'))
                ->join('pacientes as pa', 'pa.pa_id', 'atencion.pa_id')
                ->select('atencion.id', 'atencion.pa_id', 'atencion.ate_procedimiento', 'pa.pa_nombre', 'pa.pa_appaterno')->limit('10')->get();
        }

        return ['res' => $res, 'TipUsu' => Auth::user()->usu_area];
    }
    public function nroPacienteCola()
    {
        if (Auth::user()->usu_area == 'SisMed_enf') {

            $cantidad = atencion::where('ate_estAteMed', '0')
                ->whereDate('created_at', Carbon::now()->format('Y-m-d'))
                ->whereNotIn('ate_med', [0])
                ->count();
        } else {

            $cantidad = atencion::where('ate_med', Auth::user()->id)
                ->where('ate_estAteMed', '0')
                ->whereDate('created_at', Carbon::now()->format('Y-m-d'))
                ->count();
        }

        // $cantidad = atencion::where('ate_med', Auth::user()->id)
        //     ->where('ate_estAteMed', '0')
        //     ->whereDate('created_at', Carbon::now()->format('Y-m-d'))
        //     ->count();
        return ['cantidad' => $cantidad];
    }
    public function concluirAte(Request $request)
    {
        $res = atencion::where('id', $request->input('id'))->update(['ate_estAteMed' => 1]);
        return ["estado" => $res, 'id' => $request->input('id')];
    }

    public function datoClinico_1(Request $request)
    {
        $p = pacientes::where('pa_id', $request->input('id'))->first();
        $d1 = consClinica::where('id_paciente', $request->input('id'))->first();
        if ($d1 == null) {
            return ['p' => $p, 'd1' => $d1, 'd2' => ''];
        } else {
            $d2 = unserialize($d1['cc_data']);
            return ['p' => $p, 'd1' => $d1, 'd2' => $d2];
        }
    }

    public function pdf_hcl_1($id)
    {
        //   * datos del paciente
        $paciente = pacientes::where('pa_id', $id)->first();
        $edad = Carbon::createFromDate($paciente->pa_fechnac)->age;
        // * datos consultas medicas
        $d1 = consClinica::where('id_paciente', $id)->get();
        $data = [];
        foreach ($d1 as $key => $value) {
            array_push(
                $data,
                [
                    'fecha' => Carbon::parse($value->create_at)->format('d-m-Y'),
                    'med' => User::where('id', $value->ca_usu_cod)->first(),
                    'c1' => $value,
                    'c2' => unserialize($value->cc_data),
                ]
            );
        }
        $dompdf = PDF::loadView(
            'HCL.pdf_hcl',
            [
                'paciente' => $paciente,
                'data' => $data,
                'edad' => $edad,
            ]
        );
        $dompdf->setPaper(array(0, 0, 612.00, 792.00), 'portrait');
        return $dompdf->stream('invoice.pdf');
    }
}
