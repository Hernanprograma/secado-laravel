@extends('layouts.app')
<div class="container">
  <h1>Editar Muestra</h1>
  <h4><a href="{{route('muestrascamion.index')}}">Lista de muestras</a></h4>
  <!--Muestra los errores-->
  @include('partials.alerts.errors')
  <table class="table">
    <tr>
      <td>
        <form method="post" action="/muestrascamion/{{$muestra->id}}">
          <input name="_method" type="hidden" value="PUT">
          <input type="hidden" name="_token" value="{{csrf_token()}}">

          <div class="form-group">
            <label for="exampleInputEmail1">Centrifuga</label>
            <input type="text" name="centrifuga" class="form-control" placeholder="letra de la centrifuga" value="{{$muestra->centrifuga}}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Entrada</label>
            <input type="text" name="entrada" class="form-control" placeholder="muestra de entrada" value="{{$muestra->entrada}}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Salida</label>
            <input type="text" name="salida" class="form-control" placeholder="muestra de salida" value="{{$muestra->salida}}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Consigna</label>
            <input type="text" name="consigna" class="form-control" placeholder="Consigna" value="{{$muestra->consigna}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">VA(r.p.m)</label>
            <input type="text" name="va" class="form-control" placeholder="suele ser 3000" value="{{$muestra->va}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">VR(r.p.m)</label>
            <input type="text" name="vr" class="form-control" placeholder="ej4.12" value="{{$muestra->vr}}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Par</label>
            <input type="text" name="par" class="form-control" placeholder="el par a 50" value="{{$muestra->par}}">
          </div>
        </td>
        <td>
          <div class="form-group">
            <label for="exampleInputEmail1">Temp Entrada</label>
            <input type="text" name="t_entrada" class="form-control" placeholder="se para > 75º" value="{{$muestra->t_entrada}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Temp Salida</label>
            <input type="text" name="t_salida" class="form-control" placeholder="se para > 75º" value="{{$muestra->t_salida}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Vibración</label>
            <input type="text" name="vibracion" class="form-control" placeholder="vibración" value="{{$muestra->vibracion}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Caudal Entrada</label>
            <input type="text" name="caudal_ent" class="form-control" placeholder="entrada a centrífuga" value="{{$muestra->caudal_ent}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Marca de poli</label>
            <input type="text" name="marcapoli" class="form-control" placeholder="Marca de polielectrolito" value="{{$muestra->marcapoli}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Caudal de poli</label>
            <input type="text" name="caudal_poli" class="form-control" placeholder="ej:2700" value="{{$muestra->caudal_poli}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Aspecto Escurrido</label>
            <input type="text" name="aspecto" class="form-control" placeholder="Bien,Mal,Gris,Negro" value="{{$muestra->aspecto}}">
          </div>
        </td>
      </tr>

      <tr>
        
        <td>
          <button type="submit" class="btn btn-success btn-block">Actualizar</button>
        </td>
      </tr>
    </table>
  </div>