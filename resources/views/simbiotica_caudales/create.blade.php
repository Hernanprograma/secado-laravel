@extends('layouts.app')
<!--si el formulario contiene errores de validación-->
<div class="container">
  <!--si el formulario contiene errores de validación-->
  <h1>Caudales simbiotica</h1>
  <h4>{!!link_to_route('simbiotica.index',$title='Listado de consumos');!!}</h4>
  <!--Muestra los errores-->
  @include('partials.alerts.errors')
  {!! Form::open(['route' => 'simbiotica.store']) !!}

  <input type="hidden" name="_token" value="{{csrf_token()}}">
  
<div class="form-group col-md-3">
      {!!Form::label('fecha', 'Fecha');!!} 
       {!! Form::date('fecha',null, ['placeholder' =>'Selecciona la fecha','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group col-md-2">
      {!!Form::label('hora', 'Hora');!!} 
       {!! Form::time('hora',null, ['placeholder' =>'selecciona la hora','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-2 ">
      {!!Form::label('caudal', 'Caudal');!!}
      {!! Form::number('caudal',null, ['step'=>'0.01','placeholder' =>'lectura en m³','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-2">
      {!!Form::label('totalizado', 'Totalizado');!!} 
      {!! Form::number('totalizado',null, ['placeholder' =>'Caudal total','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group col-md-3">
      {!!Form::label('incidencias', 'Incidencias');!!} 
      {!! Form::textarea('incidencias',null, ['placeholder' =>'Incidencias: Luvia,fallos,etc...','class' => 'form-control'],"");!!}
    </div>


  {!! Form::submit('Guardar Datos', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}

</div>