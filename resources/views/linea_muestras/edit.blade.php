@extends('layouts.app')
<!--si el formulario contiene errores de validación-->
<div class="container">
  <!--si el formulario contiene errores de validación-->
  <h1>Insertar Muestra de Linea</h1>
  <h4>{!!link_to_route('lineamuestras.index',$title='Listado muestras de linea');!!}</h4>
  <!--Muestra los errores-->

  {!! Form::model($muestra, [
    'method' => 'put',
    'route' => ['lineamuestras.update', $muestra->id]
    ]) !!}

    <input type="hidden" name="_token" value="{{csrf_token()}}">


    <div class="form-group col-md-4">

      {!!Form::label('linea', 'Linea de secado térmico');!!}
      {!! Form::select('linea',array('A'=>'Linea A','B'=>'Linea B'),$muestra->linea,['class' => 'form-control']); !!}
    </div>
    
    
    <div class="form-group col-md-4">
      {!!Form::label('sequedadentrada', 'Sequedad entrada');!!}
      {!! Form::number('sequedadentrada',null, ['step'=>'0.01','required' => 'required','placeholder' =>'Entre 16 y 25','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group  col-md-4">
      {!!Form::label('sequedadsalida', 'Sequedad Salida');!!} 
      {!! Form::number('sequedadsalida',null, ['step'=>'0.01','required' => 'required','placeholder' =>'Debe estar entre 80 y 95','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group col-md-3">
      {!!Form::label('tt1', 'TT1');!!} 
      {!! Form::number('tt1',null, ['step'=>'0.01','placeholder' =>'Temp salida del tambor aire','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-3">
      {!!Form::label('tt2', 'TT2');!!}
      {!! Form::number('tt2',null, ['step'=>'0.01','placeholder' =>'Temp aire condensador <50°','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group col-md-3">
      {!!Form::label('tt3', 'TT3');!!} 
      {!! Form::number('tt3',null, ['step'=>'0.01','placeholder' =>'Temp aire tambor:±240°','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group col-md-3">
      {!!Form::label('tt4', 'TT4');!!} 
      {!! Form::number('tt4',null, ['step'=>'0.01','placeholder' =>'Temp aceite salida tambor: ±278°','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group col-md-3">
      {!!Form::label('intensidadtambor', 'Intensidad tambor');!!} 
      {!! Form::number('intensidadtambor',null, ['placeholder' =>'Intensidad','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group col-md-3">
      {!!Form::label('herziosbomba', 'Frecuencia bomba');!!} 
      {!! Form::number('herziosbomba',null, ['step'=>'0.01','placeholder' =>'En Hz','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group col-md-3">
      {!!Form::label('vueltasbomba', 'Vueltas bomba');!!} 
      {!! Form::number('vueltasbomba',null, ['step'=>'0.01','placeholder' =>'Número de vueltas','class'=> 'form-control'],"");!!}
    </div>
    <div class="form-group col-md-3">
      {!!Form::label('nivelsilo', 'Niv silo');!!} 
      {!! Form::number('nivelsilo',null, ['step'=>'0.01','placeholder' =>'Nivel del silo %','class'=> 'form-control'],"");!!}
    </div>

    

    {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}

  </div>