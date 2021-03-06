<?php

namespace proyectoPrueba\Http\Controllers;
use proyectoPrueba\Http\Requests\ValidaFormMuestrasCamionRequest;
use Illuminate\Http\Request;
use proyectoPrueba\MuestrasCamion;
use Carbon\Carbon;
use proyectoPrueba\User;

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

        $mes=Carbon::now()->month;
        $ano=Carbon::now()->year;
            //Traemos todos los registros de las centrifugas.


        $data = MuestrasCamion::all()->reverse();
    //Enviamos esos registros a la vista.
   // return $data;   

        return view($this->path.'.index', compact('data','mes','ano'));
    }

    public function search(Request $request)
    { 

      $mes=$request->input('mes');
      $ano=$request->input('ano');


      $data= MuestrasCamion::whereYear('hora', '=',$ano)
      ->whereMonth('hora', '=', $mes)
      ->get()->reverse();


      return view('muestras_camion.index',compact('data','mes','ano'));

  }

    public function exportsimbiotica(Request $request)
    {   
        //Request
        $mes=$request->input('mes');
        $ano=$request->input('ano');
        $datos=$request->input('data');
        //uso el metodo json_decode para transformar el request en array
        $data = json_decode($datos, TRUE);
        
        //dd($data);

        
        
        

        \Excel::create('Informe Muestras Camion', function($excel)use ($data,$mes,$ano){

            $excel->sheet('Hoja 1', function($sheet)use ($data,$mes,$ano) {

             $sheet->cells('A2:Q2', function($cells)use ($data,$mes,$ano) {
                $cells->setBackground('#fff000');


            });
             $sheet->appendRow(1, array(
                'Periodo seleccionado: ', $mes."/".$ano
                ));
             $sheet->appendRow(2, array(
                'Operario', 'Fecha',  'Hora', 'Centrifuga', 'Entrada', 'Salida', 'Consigna','VA(r.p.m) ',' VR(r.p.m)','Par(%)','Temp Entrada','Temp Salida','vibracion ','  Caudal Ent',  'Marca poli' , 'Caudal poli','Aspecto Escurrido'
                ));

             //$datosSimbio=SimbioticaCaudales::all()->reverse();




             $fila=4;

             foreach($data as $index => $simbio) {

                $hora = Carbon::createFromFormat('Y-m-d H:i:s', $simbio["created_at"]);



                $sheet->row($index+4, [





                    User::find($simbio["user_id"])->name,$hora->format('d-m-Y'),$hora->format('H:i') ,$simbio["centrifuga"],$simbio["entrada"],$simbio["salida"],$simbio["consigna"],$simbio["va"],$simbio["vr"],$simbio["par"] ,$simbio["t_entrada"],$simbio["t_salida"] ,$simbio["vibracion"],$simbio["caudal_ent"],$simbio["marcapoli"] ,$simbio["caudal_poli"],$simbio["aspecto"]
                    ]); 
                $fila++;


            }





        });


        })->export('xls');
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
        $fecha=$request->fecha;
        $hora=$request->hora.':00';

        $muestra=new MuestrasCamion;
        $muestra->user_id=$request->user()->id;
        $muestra->centrifuga =$request->centrifuga;
        $muestra->updated_at =$fecha.' '.$hora;
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
