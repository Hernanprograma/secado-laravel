@extends('layouts.app')
<div class="container">
  <!--si el formulario contiene errores de validación-->

  <h1>Insertar Muestra</h1>
  <h4><a href="{{route('muestrascamion.index') }}">Lista de muestras</a></h4>
  <hr>
  <!--Muestra los errores-->
  @include('partials.alerts.errors')


  <form method="post" action="/muestrascamion">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <table class="table">
      <tr>
        <td>
          <div class="form-group">
            <label for="exampleInputEmail1">Centrifuga</label>
            <input type="text" name="centrifuga" class="form-control" placeholder="letra de la centrifuga" value="{{ old('centrifuga') }}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Entrada</label>
            <input type="text" name="entrada" class="form-control" placeholder="muestra de entrada"value="{{ old('entrada') }}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Salida</label>
            <input type="text" name="salida" class="form-control" placeholder="muestra de salida"value="{{ old('salida') }}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Consigna</label>
            <input type="text" name="consigna" class="form-control" placeholder="Consigna">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">VA(r.p.m)</label>
            <input type="text" name="va" class="form-control" placeholder="suele ser 3000">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">VR(r.p.m)</label>
            <input type="text" name="vr" class="form-control" placeholder="ej4.12">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Par</label>
            <input type="text" name="par" class="form-control" placeholder="el par a 50">
          </div>
        </td>
        <td>
          <div class="form-group">
            <label for="exampleInputEmail1">Temp Entrada</label>
            <input type="text" name="t_entrada" class="form-control" placeholder="se para > 75º">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Temp Salida</label>
            <input type="text" name="t_salida" class="form-control" placeholder="se para > 75º">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Vibración</label>
            <input type="text" name="vibracion" class="form-control" placeholder="vibración">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Caudal Entrada</label>
            <input type="text" name="caudal_ent" class="form-control" placeholder="entrada a centrífuga">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Marca de poli</label>
            <input type="text" name="marcapoli" class="form-control" placeholder="Marca de polielectrolito">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Caudal de poli</label>
            <input type="text" name="caudal_poli" class="form-control" placeholder="ej:2700">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Aspecto Escurrido</label>
            <input type="text" name="aspecto" class="form-control" placeholder="Bien,Mal,Gris,Negro">
          </div>
        </td>
      </tr>

      <tr>
        <td>  









        </td>
        <td>
          <button type="submit" class="btn btn-success btn-block">Guardar</button>
        </td>
      </tr>
    </table>
  </div>