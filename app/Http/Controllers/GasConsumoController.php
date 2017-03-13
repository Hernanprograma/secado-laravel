<?php

namespace proyectoPrueba\Http\Controllers;

use proyectoPrueba\Http\Requests\ValidaFormGasConsumoRequest;
use Illuminate\Http\Request;
use proyectoPrueba\GasConsumo;

class GasConsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $data = GasConsumo::all()->reverse();
                      
        return view('gas_consumo.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gas_consumo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaFormGasConsumoRequest $request)
    {
        $consumo=new GasConsumo;
        $consumo->receptora_lectura =$request->receptora_lectura;
        $consumo->receptora_vb= $request->receptora_vb;
        $consumo->receptora_vm=$request->receptora_vm;
        $consumo->caldera=$request->caldera;
        $consumo->caldera_vbt=$request->caldera_vbt;
        $consumo->caldera_vmt=$request->caldera_vmt;
        $consumo->coogeneracion_lectura=$request->coogeneracion_lectura;
        $consumo->coogeneracion_vbt=$request->coogeneracion_vbt;
        $consumo->coogeneracion_vmt=$request->coogeneracion_vmt;
       
        $consumo->save();
        \Session::flash('msg', 'Cambios guardados' );
        return redirect()->route('gasconsumo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consumo=GasConsumo::findOrFail($id);
        //return view('gasconsumo.edit', compact('consumo'));
        return view('gas_consumo.edit', compact('consumo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidaFormGasConsumoRequest $request, $id)
    {
        $consumo=GasConsumo::findOrFail($id);
        $consumo->receptora_lectura =$request->receptora_lectura;
        $consumo->receptora_vb= $request->receptora_vb;
        $consumo->receptora_vm=$request->receptora_vm;
        $consumo->caldera=$request->caldera;
        $consumo->caldera_vbt=$request->caldera_vbt;
        $consumo->caldera_vmt=$request->caldera_vmt;
        $consumo->coogeneracion_lectura=$request->coogeneracion_lectura;
        $consumo->coogeneracion_vbt=$request->coogeneracion_vbt;
        $consumo->coogeneracion_vmt=$request->coogeneracion_vmt;
       
        $consumo->save();
        \Session::flash('msg', 'Cambios guardados' );
        return redirect()->route('gasconsumo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consumo=GasConsumo::findOrFail($id);
        $consumo->delete();
         \Session::flash('deleted', 'El registro ha sido eliminado');
        return redirect()->route('gasconsumo.index');
    }
}
