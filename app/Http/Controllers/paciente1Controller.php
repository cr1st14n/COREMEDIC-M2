<?php

namespace App\Http\Controllers;

use App\consClinica;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class paciente1Controller extends Controller
{
    public function __construct()
    {
    }

    public function busq1(Request $request)
    {
        switch ($request->input('A')) {
            case '1':
                $data = consClinica::where('cc_diagnostico', 'like', $request->input('B') . '%')
                    ->limit('10')
                    ->join('pacientes', 'cons_clinicas.id_paciente', '=', 'pacientes.pa_id')
                    ->select(
                        'pacientes.pa_id',
                        'pacientes.pa_nombre',
                        'pacientes.pa_appaterno',
                        'pacientes.pa_apmaterno',
                        'pacientes.pa_ci',
                        'cons_clinicas.cc_diagnostico',
                        'cons_clinicas.cc_motivo',
                        'cons_clinicas.id',
                        'cons_clinicas.created_at as fecha'
                    )
                    ->get();
                break;

            default:
                # code...
                break;
        }
        return $data;
    }
}
