@extends('layouts.app')
<!--si el formulario contiene errores de validación-->
<div class="container">
  <!--si el formulario contiene errores de validación-->
  <h1>Consumos de gas</h1>
  <h4>{!!link_to_route('gasconsumo.index',$title='Listado de consumos')!!}</h4>
  <!--Muestra los errores-->
  @include('partials.alerts.errors')
  {!! Form::model($consumo, [
    'method' => 'put',
    'route' => ['gasconsumo.update', $consumo->id]
    ]) !!}

    <div class="col-md-4">

      <!--Receptora de gas-->
      <h2>Receptora de gas</h2>
      <div class="form-group">
        {!!Form::label('receptora_lectura', 'Lectura');!!}
        {!! Form::number('receptora_lectura',null, ['step'=>'0.01','placeholder' =>'lectura en m³','class' => 'form-control'],"");!!}
      </div>

      <div class="form-group">
        {!!Form::label('receptora_vb', 'Vb(Nm³)');!!} 
        {!! Form::number('receptora_vb',null, ['step'=>'0.01','placeholder' =>'Vb(Nm³)','class' => 'form-control'],"");!!}
      </div>
      <div class="form-group">
        {!!Form::label('receptora_vm', 'Vm(m³)');!!} 
        {!! Form::number('receptora_vm',null, ['step'=>'0.01','placeholder' =>'Vm(m³)','class' => 'form-control'],"");!!}
      </div>
    </div>
    <!--Calderas-->
    <div class="col-md-4">
      <h2>Calderas</h2>
      <div class="form-group">
        {!!Form::label('caldera', 'Lectura');!!}
        {!! Form::number('caldera',null, ['step'=>'0.01','placeholder' =>'lectura en m³','class' => 'form-control'],"");!!}
      </div>
      <div class="form-group">
        {!!Form::label('caldera_vbt', 'Vb(Nm³)');!!} 
        {!! Form::number('caldera_vbt',null, ['step'=>'0.01','placeholder' =>'Vbt(Nm³)','class' => 'form-control'],"");!!}
      </div>
      <div class="form-group">
        {!!Form::label('caldera_vmt', 'Vm(m³)');!!} 
        {!! Form::number('caldera_vmt',null, ['step'=>'0.01','placeholder' =>'Vmt(m³)','class' => 'form-control'],"");!!}
      </div>
    </div>


    <!--Coogeneracion-->
    <div class="col-md-4">
      <h2>Coogeneración</h2>
      <div class="form-group">
        {!!Form::label('coogeneracion_lectura', 'Lectura');!!} 
        {!! Form::number('coogeneracion_lectura',null, ['step'=>'0.01','placeholder' =>'lectura en m³','class' => 'form-control'],"");!!}
      </div>
      <div class="form-group">
        {!!Form::label('coogeneracion_vbt', 'Vb(Nm³)');!!} 
        {!! Form::number('coogeneracion_vbt',null, ['step'=>'0.01','placeholder' =>'Vbt(Nm³)','class' => 'form-control'],"");!!}
      </div>
      <div class="form-group">
        {!!Form::label('coogeneracion_vmt', 'Vm(m³)');!!} 
        {!! Form::number('coogeneracion_vmt',null, ['step'=>'0.01','placeholder' =>'Vmt(m³)','class'=> 'form-control'],"");!!}
      </div>
    </div>


    {!! Form::submit('Guardar Datos', ['class' => 'btn btn-primary']) !!} 
    {!! Form::close() !!}

  </div>