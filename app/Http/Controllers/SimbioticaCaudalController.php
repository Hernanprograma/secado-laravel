<?php

namespace proyectoPrueba\Http\Controllers;

use Illuminate\Http\Request;
use proyectoPrueba\SimbioticaCaudales;

class SimbioticaCaudalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=SimbioticaCaudales::all()->reverse();
        //dd($data);
        return view('simbiotica_caudales.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('simbiotica_caudales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $simbiotica=new  SimbioticaCaudales;


        $simbiotica->caudal=$request->caudal;
        $simbiotica->totalizado=$request->totalizado;
        $simbiotica->incidencias=$request->incidencias;

        $simbiotica->save();
        \Session::flash('msg', 'Cambios guardados' );
        return redirect()->route('simbiotica_caudales.index');
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
     $simbiotica=SimbioticaCaudales::findOrFail($id);
        //return view('gasconsumo.edit', compact('consumo'));
     return view('simbiotica_caudales.edit', compact('simbiotica'));
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
        $simbiotica=SimbioticaCaudales::findOrFail($id);

        $simbiotica->caudal=$request->caudal;
        $simbiotica->totalizado=$request->totalizado;
        $simbiotica->incidencias=$request->incidencias;

        $simbiotica->save();
        \Session::flash('msg', 'Cambios guardados' );
        return redirect()->route('simbiotica_caudales.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $simbiotica=SimbioticaCaudales::findOrFail($id);
        $simbiotica->delete();
        \Session::flash('deleted', 'El registro ha sido eliminado');
        return redirect()->route('simbiotica_caudales.index');
    }
    
}
