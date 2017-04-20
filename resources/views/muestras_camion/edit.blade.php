@extends('layouts.app')
<div class="container">
  <h1>Editar Muestra</h1>
  <h4><a href="{{route('muestrascamion.index')}}">Lista de muestras</a></h4>
  <!--Muestra los errores-->
  @include('partials.alerts.errors')
  
  {!! Form::model($muestra, [
    'method' => 'put',
    'route' => ['muestrascamion.update', $muestra->id]
    ]) !!}

    <input type="hidden" name="_token" value="{{csrf_token()}}">


    <div class="form-group col-md-4">
      {!!Form::label('centrifuga', 'Centrifuga');!!}
      {!! Form::select('centrifuga',array('A'=>'Centrifuga A','B'=>'Centrifuga B','C'=>'Centrifuga C'),$muestra->centrifuga,['class' => 'form-control']); !!}
    </div>

     
    <div class="form-group col-md-4">
      {!!Form::label('entrada', 'Entrada');!!} 
      {!! Form::number('entrada',null, ['step'=>'0.01','placeholder' =>'Sequedad de entrada','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-4 ">
      {!!Form::label('salida', 'Salida');!!}
      {!! Form::number('salida',null, ['step'=>'0.01','placeholder' =>'Sequedad de salida','class' => 'form-control'],"");!!}
    </div>


    <div class="form-group col-md-3 ">
      {!!Form::label('consigna', 'Consigna');!!}
      {!! Form::number('consigna',null, ['step'=>'0.01','placeholder' =>'Consigna','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-3 ">
      {!!Form::label('va', 'VA(r.p.m)');!!}
      {!! Form::number('va',null, ['step'=>'0.01','placeholder' =>'Suele ser 3000','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-3 ">
      {!!Form::label('vr', 'VR(r.p.m)');!!}
      {!! Form::number('vr',null, ['step'=>'0.01','placeholder' =>'Ejemplo:4.12','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-3 ">
      {!!Form::label('par', 'Par');!!}
      {!! Form::number('par',null, ['step'=>'0.01','placeholder' =>'El par a 50','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-3 ">
      {!!Form::label('t_entrada', 'Temp Entrada');!!}
      {!! Form::number('t_entrada',null, ['step'=>'0.01','placeholder' =>'Se para > 75º','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-3 ">
      {!!Form::label('t_salida', 'Temp Salida');!!}
      {!! Form::number('t_salida',null, ['step'=>'0.01','placeholder' =>'Se para > 75º','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-3 ">
      {!!Form::label('vibracion', 'Vibración');!!}
      {!! Form::number('vibracion',null, ['step'=>'0.01','placeholder' =>'Vibración','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-3 ">
      {!!Form::label('caudal_ent', 'Caudal Entrada');!!}
      {!! Form::number('caudal_ent',null, ['step'=>'0.01','placeholder' =>'Caudal entrada a centrífuga','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-3 ">
      {!!Form::label('marcapoli', 'Marca de poli');!!}
      {!! Form::text('marcapoli',null, ['placeholder' =>'Marca de polielectrolito','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-3 ">
      {!!Form::label('caudal_poli', 'Caudal de poli');!!}
      {!! Form::number('caudal_poli',null, ['step'=>'0.01','placeholder' =>'Ej:2700','class' => 'form-control'],"");!!}
    </div>

    <div class="form-group col-md-4">
      {!!Form::label('aspecto', 'Aspecto Escurrido');!!}
      {!! Form::select('aspecto',array('Blanco'=>'Blanco','Gris'=>'Gris','Negro'=>'Negro'),$muestra->aspecto,['class' => 'form-control']); !!}
    </div>

  

    {!! Form::submit('Actualizar', ['class' => 'btn btn-success btn-block']) !!} {!! Form::close() !!}

</div>