<?php

namespace secadotermico\Http\Controllers;
use secadotermico\Http\Requests\ValidaSimbioticaCaudalesRequest;
use Illuminate\Http\Request;
use secadotermico\SimbioticaCaudales;
use secadotermico\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Log;


class SimbioticaCaudalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data= SimbioticaCaudales::all()->reverse();
        $mes=Carbon::now()->month;
        $ano=Carbon::now()->year;

        return view('simbiotica_caudales.index',compact('data','mes','ano'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    { 


        //var_dump($input);
      $mes=$request->input('mes');
      $ano=$request->input('ano');


      $data= SimbioticaCaudales::whereYear('hora', '=',$ano)
      ->whereMonth('hora', '=', $mes)
      ->get()->reverse();






      return view('simbiotica_caudales.index',compact('data','mes','ano'));

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
        \Session::flash('msg', 'Cambios guardados');
        return redirect()->route('simbiotica.index');
    }
    public function sumaDiferenciaTotalCaudales($data){
        $firstArrayvalue=current($data);
        $endArrayvalue=end($data);
        reset($data);
        //obtengo el primer y último valor del array para sumarlos
        $sumaLastFirst=$firstArrayvalue['totalizado']-$endArrayvalue['totalizado'];
        
        return $sumaLastFirst;
    }

    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $muestra=SimbioticaCaudales::findOrFail($id);
        //return view('gasconsumo.edit', compact('consumo'));

     return view('simbiotica_caudales.edit', compact('muestra'));

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

        $auxFecha=$request->fecha;
        $auxHora=$request->hora;
        $hora= $auxFecha." ".$auxHora;

        $simbiotica->hora=strtotime($hora);
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
