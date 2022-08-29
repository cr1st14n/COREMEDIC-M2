<?php

namespace App\Http\Controllers;

use App\descargoItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->usu_area == 'Quirofano') {
            $items1 = descargoItem::where('dmi_tipo', 'medicamento')->get();
            $items2 = descargoItem::where('dmi_tipo', 'insumo')->get();
            return view('home1', compact(['items1', 'items2']));
        }
        return view('home');
    }
    public function editUsu(Request $request)
    {
        return user::where('id', Auth::user()->id)->first();
    }
    public function updateUsu(Request $request)
    {
        if ($request->input("createUserCiUp")==User::where('id', Auth::user()->id)->value('usu_ci')) {
            return $res = User::where('id', Auth::user()->id)->update([
                'usu_ci' => $request->input("createUserCiUp"),
                'usu_nombre' => $request->input("nombreUp"),
                'usu_appaterno' => $request->input("apellido1Up"),
                'usu_apmaterno' => $request->input("apellido2Up"),
                'usu_fechnac' => $request->input("fechaNacimientoUp"),
                'usu_paisnac' => $request->input("paisNacimientoUp"),
                'usu_depnac' => $request->input("depNacimientoUp"),
                'usu_tipoSangre' => $request->input("tipoSangreUp"),
                'usu_sexo' => $request->input("sexoUp"),
                'email' => $request->input("emailUp"),
                'usu_estadocivil' => $request->input("estadoCivilUp"),
                'usu_telf' => $request->input("telfUp"),
                'usu_telfref' => $request->input("telfRefUp"),
                'usu_zonaSufragio' => $request->input("zonaSufragioUp"),
                'usu_zona' => $request->input("zonaUp"),
                'usu_domicilio' => $request->input("domicilioUp"),
            ]);
        }
        if ($request->input("createUserCiUp")==User::where('usu_ci', $request->input("createUserCiUp"))->value('usu_ci')) {
            return 2;
        }

        return $res = User::where('id', Auth::user()->id)->update([
            'usu_ci' => $request->input("createUserCiUp"),
            'usu_nombre' => $request->input("nombreUp"),
            'usu_appaterno' => $request->input("apellido1Up"),
            'usu_apmaterno' => $request->input("apellido2Up"),
            'usu_fechnac' => $request->input("fechaNacimientoUp"),
            'usu_paisnac' => $request->input("paisNacimientoUp"),
            'usu_depnac' => $request->input("depNacimientoUp"),
            'usu_tipoSangre' => $request->input("tipoSangreUp"),
            'usu_sexo' => $request->input("sexoUp"),
            'email' => $request->input("emailUp"),
            'usu_estadocivil' => $request->input("estadoCivilUp"),
            'usu_telf' => $request->input("telfUp"),
            'usu_telfref' => $request->input("telfRefUp"),
            'usu_zonaSufragio' => $request->input("zonaSufragioUp"),
            'usu_zona' => $request->input("zonaUp"),
            'usu_domicilio' => $request->input("domicilioUp"),
        ]);
    }
    public function updatePass(Request $request)
    {
        return User::where('id', Auth::user()->id)->update(['password' => bcrypt($request->input("password"))]);
        
    }
}
