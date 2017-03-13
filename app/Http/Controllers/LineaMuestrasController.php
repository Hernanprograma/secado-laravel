<?php
namespace proyectoPrueba\Http\Controllers;

use Illuminate\Http\Request;
use proyectoPrueba\LineaMuestra;


class LineaMuestrasController extends Controller
{
	public function index()
	{
		$muestras = LineaMuestra::all()->reverse(); 
		//dd($muestras);

		return view('linea_muestras.index',['muestras'=>$muestras]);

	}
	public function create()
	{
		return view('linea_muestras.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	$muestra=new LineaMuestra;
    	$muestra->linea =$request->linea;
    	$muestra->sequedadentrada= $request->sequedadentrada;
    	$muestra->sequedadsalida=$request->sequedadsalida;
    	$muestra->tt1=$request->tt1;
    	$muestra->tt2=$request->tt2;
    	$muestra->tt3=$request->tt3;
    	$muestra->tt4=$request->tt4;
    	$muestra->intensidadtambor=$request->intensidadtambor;
    	$muestra->herziosbomba=$request->herziosbomba;
    	$muestra->vueltasbomba=$request->vueltasbomba;
    	$muestra->nivelsilo=$request->nivelsilo;
    	


    	$muestra->save();
    	\Session::flash('msg', 'Cambios guardados' );
    	return redirect()->route('lineamuestras.index');
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
    	$muestra=LineaMuestra::findOrFail($id);
    	return view($this->path.'.edit', compact('muestra'));
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

    	$muestra=LineaMuestra::findOrFail($id);
    	$muestra->linea =$request->linea;
    	$muestra->sequedadentrada= $request->sequedadentrada;
    	$muestra->sequedadsalida=$request->sequedadsalida;
    	$muestra->tt1=$request->tt1;
    	$muestra->tt2=$request->tt2;
    	$muestra->tt3=$request->tt3;
    	$muestra->tt4=$request->tt4;
    	$muestra->intensidadtambor=$request->intensidadtambor;
    	$muestra->herziosbomba=$request->herziosbomba;
    	$muestra->vueltasbomba=$request->vueltasbomba;
    	$muestra->nivelsilo=$request->nivelsilo;

    	$muestra->save();
    	\Session::flash('msg', 'Cambios guardados' );
    	return redirect()->route('lineamuestras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$muestra=LineaMuestra::findOrFail($id);
    	$muestra->delete();
    	\Session::flash('deleted','El registro ha sido eliminado');
    	return redirect()->route('lineamuestras.index');
    }
}