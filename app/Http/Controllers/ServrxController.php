<?php

namespace App\Http\Controllers;

use App\servrx;
use Illuminate\Http\Request;

use App\File;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServrxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request,$paciente)
    {
        // return $request;
        //* correr en terminal el comando php artisan storage link
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);
        $imagenes = $request->file('file')->store('public/imagenes');
        $url = Storage::url($imagenes);
        $file=new servrx();
        $file->id_paciente=$paciente;
        $file->rx_rutaImagen="public$url";
        $file->rx_descripcion=$request->input('rxDescImagen');
        $file->rx_factura=$request->input('rxfactura');
        $file->rx_medicoTratante=$request->input('rxmedicoTratante');
        $file->ca_usu_cod=Auth::user()->id;
        $file->ca_tipo='create';
        $file->ca_fecha=Carbon::now();
        $file->ca_estado='1';
        $res= $file->save();
        $retVal = ($res) ? 1 : 0 ;
        return $retVal;
    }

    public function listPaciSerRX(Request $request)
    {
        return servrx::where('id_paciente',$request->input('paciente'))->where('ca_estado','1')->orderBy('created_at','desc')->get();
    }

    public function showPlacaRX(Request $request)
    {
        return servrx::where('id',$request->input('id_rx'))->first();
    }
    
    public function delete($id)
    {
        $rx=servrx::find($id);
        // return $res=$rx->delete();
        $rx->ca_estado='0';
        return $res=$rx->save();
    }
}
