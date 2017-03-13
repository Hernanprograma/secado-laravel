@extends('layouts.app')
<!--si el formulario contiene errores de validación-->
<div class="container">
  <!--si el formulario contiene errores de validación-->
  <h1>Consumos de gas</h1>
  <h4>{!!link_to_route('gasconsumo.index',$title='Listado de consumos');!!}</h4>
  <!--Muestra los errores-->
  @include('partials.alerts.errors')
  {!! Form::open(['route' => 'gasconsumo.store']) !!}

  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="col-md-4">

    <!--Receptora de gas-->
    <h2>Receptora de gas</h2>
    <div class="form-group">
      {!!Form::label('receptora_lectura', 'Lectura');!!}
      {!! Form::text('receptora_lectura',null, ['placeholder' =>'lectura en m³','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('receptora_vb', 'Vb(Nm³)');!!} 
      {!! Form::text('receptora_vb',null, ['placeholder' =>'Vb(Nm³)','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('receptora_vm', 'Vm(m³)');!!} 
      {!! Form::text('receptora_vm',null, ['placeholder' =>'Vm(m³)','class' => 'form-control'],"");!!}
    </div>
  </div>
  <!--Calderas-->
  <div class="col-md-4">
    <h2>Calderas</h2>
    <div class="form-group">
      {!!Form::label('caldera', 'Lectura');!!}
      {!! Form::text('caldera',null, ['placeholder' =>'lectura en m³','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('caldera_vbt', 'Vb(Nm³)');!!} 
      {!! Form::text('caldera_vbt',null, ['placeholder' =>'Vbt(Nm³)','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('caldera_vmt', 'Vm(m³)');!!} 
      {!! Form::text('caldera_vmt',null, ['placeholder' =>'Vmt(m³)','class' => 'form-control'],"");!!}
    </div>
  </div>


  <!--Coogeneracion-->
  <div class="col-md-4">
    <h2>Coogeneración</h2>
    <div class="form-group">
      {!!Form::label('coogeneracion_lectura', 'Lectura');!!} 
      {!! Form::text('coogeneracion_lectura',null, ['placeholder' =>'lectura en m³','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('coogeneracion_vbt', 'Vb(Nm³)');!!} 
      {!! Form::text('coogeneracion_vbt',null, ['placeholder' =>'Vbt(Nm³)','class' => 'form-control'],"");!!}
    </div>
    <div class="form-group">
      {!!Form::label('coogeneracion_vmt', 'Vm(m³)');!!} 
      {!! Form::text('coogeneracion_vmt',null, ['placeholder' =>'Vmt(m³)','class'=> 'form-control'],"");!!}
    </div>
  </div>
  

  {!! Form::submit('Guardar Datos', ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}

</div>