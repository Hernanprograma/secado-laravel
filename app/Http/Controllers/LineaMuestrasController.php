<?php
namespace proyectoPrueba\Http\Controllers;
use proyectoPrueba\Http\Requests\ValidaFormLineaMuestrasRequest;
use Illuminate\Http\Request;
use proyectoPrueba\LineaMuestra;


class LineaMuestrasController extends Controller
{
    public function index(){
    	//$muestras = LineaMuestra::all()->reverse();
        $muestras=Lineamuestra::latest()->Paginate(10);
       		//dd($muestras);

        return view('linea_muestras.index',['muestras'=>$muestras]);

    }
    public function create()
    {
      return view('linea_muestras.create');
  }

  public function exportsimbiotica(Request $request)
    {   
        //Request
        $mes=$request->input('mes');
        $ano=$request->input('ano');
        $datos=$request->input('data');
        //uso el metodo json_decode para transformar el request en array
        $data = json_decode($datos, TRUE);
        

        
        
        //dd($firstArrayvalue["totalizado"]-$endArrayvalue["totalizado"]);
        
        //dd("");
        

        //$valor1=SimbioticaCaudales::orderBy('hora', 'asc')->first();
        //$valor2=SimbioticaCaudales::orderBy('hora', 'desc')->first();

        //dd($data2->totalizado-$data->totalizado);

        //$users = DB::table('simbiotica_caudales')->get();
        //$user = DB::table('simbiotica_caudales')->select('id', 'hora')->get();
        //$user=User::all();
        //$name=User::find(12)->simbiotica;

        //dd($name);

        /*$q->whereDay('created_at', '=', date('d'));
        $q->whereMonth('created_at', '=', date('m'));
        $q->whereYear('created_at', '=', date('Y'));*/

        \Excel::create('Informe Simbiotica', function($excel)use ($data,$mes,$ano){

            $excel->sheet('Hoja 1', function($sheet)use ($data,$mes,$ano) {

             $sheet->cells('A2:F2', function($cells)use ($data,$mes,$ano) {
                $cells->setBackground('#fff000');


            });
             $sheet->appendRow(1, array(
                'Periodo seleccionado: ', $mes."/".$ano
                ));
             $sheet->appendRow(2, array(
                'DIA', 'OPERARIO','CAUDAL','TOTALIZADO','HORA','INCIDENCIAS'
                ));

             //$datosSimbio=SimbioticaCaudales::all()->reverse();




             $fila=4;

             foreach($data as $index => $simbio) {
                 $hora = Carbon::createFromFormat('Y-m-d H:i:s', $simbio["hora"]);


                 $sheet->row($index+4, [





                    $hora->format('d-m-Y'),User::find($simbio["user_id"])->name,$simbio["caudal"],$simbio["totalizado"],$hora->format('H:i'),$simbio["incidencias"]
                    ]); 
                 $fila++;


             }

             $sheet->row($fila, array(
                ' ',' ',' ',' ',' ',' ','CAUDAL TOTAL:',$this->sumaDiferenciaTotalCaudales($data)
                ));




         });


        })->export('xls');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaFormLineaMuestrasRequest $request)
    {
        

        $muestra=new LineaMuestra;
        $muestra->user_id=$request->user()->id;
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
       return view('linea_muestras.edit', compact('muestra'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidaFormLineaMuestrasRequest $request, $id)
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
