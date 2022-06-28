<?php

namespace App\Http\Controllers;

use App\descargoItem;
use App\descargoMedicoCont;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class descargoMedicoContController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newDMC=new descargoMedicoCont();
        $newDMC->id_descMed =$request->input('id_desMed_createDesCon');
        $newDMC->id_descItem =$request->input('item');
        $newDMC->dmc_cantidad =$request->input('cantidad');
        $newDMC->ca_usu_cod = Auth::user()->usu_ci;
        $newDMC->ca_tipo ='create';
        $newDMC->ca_fecha =Carbon::now();
        $newDMC->ca_estado =1;
        $res=$newDMC->save();
        if ($res) {
            return descargoMedicoCont::where('id_descMed',$newDMC->id_descMed)
            ->join('descargo_items as di','di.id','descargo_medico_conts.id_descItem')
            ->where('di.dmi_tipo',
                (descargoItem::where('id',$newDMC->id_descItem)
                ->value('dmi_tipo')))
            ->select('di.dmi_nombre','descargo_medico_conts.dmc_cantidad')->get();
            return $newDMC;
        } else {
            return 0;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'destroy';
    }
}
