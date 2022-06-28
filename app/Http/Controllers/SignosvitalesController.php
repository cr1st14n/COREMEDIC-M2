<?php

namespace App\Http\Controllers;

use App\signosvitales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Opis\Closure\serialize;
use function Opis\Closure\unserialize;

class SignosvitalesController extends Controller
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
    public function store($idPaciente, Request $request)
    {
        $sv=new signosvitales();
        $sv->sv_idPaciente=$request['paciente'];
        $sv->sv_pa=$request->input('pa');
        $sv->sv_fc=$request->input('fc');
        $sv->sv_fr=$request->input('fr');
        $sv->sv_st=$request->input('st');
        $sv->sv_pe=$request->input('pe');
        $sv->sv_te=$request->input('te');
        $sv->sv_ta=$request->input('ta');

        $sv->ca_usu_cod = Auth::user()->id;
        $sv->ca_tipo = 'create';
        $sv->ca_fecha = Carbon::now();
        $sv->ca_estado = '1';
        $r=$sv->save();
        $re= ($r) ? 1 : 0 ;
        return $re;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\signosvitales  $signosvitales
     * @return \Illuminate\Http\Response
     */
    public function show(signosvitales $signosvitales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\signosvitales  $signosvitales
     * @return \Illuminate\Http\Response
     */
    public function edit(signosvitales $signosvitales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\signosvitales  $signosvitales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, signosvitales $signosvitales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\signosvitales  $signosvitales
     * @return \Illuminate\Http\Response
     */
    public function destroy(signosvitales $signosvitales)
    {
        //
    }

    public function list1(Request $request)
    {
        return signosvitales::where('sv_idPaciente',$request->input('paciente'))->get();
    }
}
