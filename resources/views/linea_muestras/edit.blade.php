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

    <div class="form-group">
      {!!Form::label('linea', 'Linea');!!}
      {!! Form::text('linea',null, ['placeholder' =>'A o B','class' => 'form-control'],"");!!}
    </div>
    
    
    <div class="form-group">
      {!!Form::label('sequedadentrada', 'Sequedad entrada');!!}
      {!! Form::text('sequedadentrada',null, ['placeholder' =>'Entre 16 y 25','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('sequedadsalida', 'Sequedad Salida');!!} 
      {!! Form::text('sequedadsalida',null, ['placeholder' =>'Debe estar entre 80 y 95','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('tt1', 'TT1');!!} 
      {!! Form::text('tt1',null, ['placeholder' =>'Temp salida del tambor aire','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group">
      {!!Form::label('tt2', 'TT2');!!}
      {!! Form::text('tt2',null, ['placeholder' =>'Temp aire condensador <50°','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('tt3', 'TT3');!!} 
      {!! Form::text('tt3',null, ['placeholder' =>'Temp aire tambor:±240°','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('tt4', 'TT4');!!} 
      {!! Form::text('tt4',null, ['placeholder' =>'Temp aceite salida tambor: ±278°','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('intensidadtambor', 'Intensidad tambor');!!} 
      {!! Form::text('intensidadtambor',null, ['placeholder' =>'Intensidad','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('herziosbomba', 'Frecuencia bomba');!!} 
      {!! Form::text('herziosbomba',null, ['placeholder' =>'En Hz','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('vueltasbomba', 'Vueltas bomba');!!} 
      {!! Form::text('vueltasbomba',null, ['placeholder' =>'Número de vueltas','class'=> 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('nivelsilo', 'Niv silo');!!} 
      {!! Form::text('nivelsilo',null, ['placeholder' =>'Nivel del silo %','class'=> 'form-control'],"");!!}
    </div>

    

    {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}

  </div>