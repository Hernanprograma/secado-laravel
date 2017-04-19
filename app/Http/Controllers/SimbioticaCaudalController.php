<?php

namespace proyectoPrueba\Http\Controllers;
use proyectoPrueba\Http\Requests\ValidaSimbioticaCaudalesRequest;
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
    public function store (ValidaSimbioticaCaudalesRequest $request)

    {
        //recojo los datos de la fecha del request separados para luego enviarlos a a la bd
        $auxFecha=$request->fecha;
        $auxHora=$request->hora;

        $hora= $auxFecha." ".$auxHora;
        
        //$timestamp = \Carbon::createFromTimestamp($auxFecha . $hora);

        $simbiotica=new  SimbioticaCaudales;

        $simbiotica->user_id=$request->user()->id;
        $simbiotica->hora=strtotime($hora);
        $simbiotica->caudal=$request->caudal;
        $simbiotica->totalizado=$request->totalizado;
        $simbiotica->incidencias=$request->incidencias;

        $simbiotica->save();
        \Session::flash('msg', 'Cambios guardados' );
        return redirect()->route('simbiotica.index');
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
       return view('simbiotica.edit', compact('simbiotica'));
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
        return redirect()->route('simbiotica.index');
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
     return redirect()->route('simbiotica.index');
 }

}
