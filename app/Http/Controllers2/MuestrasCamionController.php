<?php

namespace proyectoPrueba\Http\Controllers;

use proyectoPrueba\Http\Requests\ValidaFormMuestrasCamionRequest;
use Illuminate\Http\Request;
use proyectoPrueba\MuestrasCamion;

class MuestrasCamionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $path='muestras_camion';

    public function index()
    {
            //Traemos todos los registros de las centrifugas.
        $data = MuestrasCamion::all()->reverse();
    //Enviamos esos registros a la vista.
   // return $data;   
            
       return view($this->path.'.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view($this->path.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaFormMuestrasCamionRequest $request)
    {
   
        $muestra=new MuestrasCamion;
        $muestra->user_id=$request->user()->id;
        $muestra->centrifuga =$request->centrifuga;
        $muestra->entrada= $request->entrada;
        $muestra->salida=$request->salida;
        $muestra->consigna=$request->consigna;
        $muestra->va=$request->va;
        $muestra->vr=$request->vr;
        $muestra->par=$request->par;
        $muestra->t_entrada=$request->t_entrada;
        $muestra->t_salida=$request->t_salida;
        $muestra->vibracion=$request->vibracion;
        $muestra->caudal_ent=$request->caudal_ent;
        $muestra->marcapoli=$request->marcapoli;
        $muestra->caudal_poli=$request->caudal_poli;
        $muestra->aspecto=$request->aspecto;

        

        $muestra->save();
        \Session::flash('msg', 'Cambios guardados' );
        return redirect()->route('muestrascamion.index');
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
        $muestra=MuestrasCamion::findOrFail($id);
        return view($this->path.'.edit', compact('muestra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidaFormMuestrasCamionRequest $request, $id)
    {
        
        $muestra=MuestrasCamion::findOrFail($id);
        $muestra->centrifuga=$request->centrifuga;
        $muestra->entrada=$request->entrada;
        $muestra->salida=$request->salida;
        $muestra->consigna=$request->consigna;
        $muestra->va=$request->va;
        $muestra->vr=$request->vr;
        $muestra->par=$request->par;
        $muestra->t_entrada=$request->t_entrada;
        $muestra->t_salida=$request->t_salida;
        $muestra->vibracion=$request->vibracion;
        $muestra->caudal_ent=$request->caudal_ent;
        $muestra->marcapoli=$request->marcapoli;
        $muestra->caudal_poli=$request->caudal_poli;
        $muestra->aspecto=$request->aspecto;

        $muestra->save();
        \Session::flash('msg', 'Cambios guardados' );
        return redirect()->route('muestrascamion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $muestra=MuestrasCamion::findOrFail($id);
        $muestra->delete();
        \Session::flash('deleted','El registro ha sido eliminado');
        return redirect()->route('muestrascamion.index');
    }
}
