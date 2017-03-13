@extends('layouts.app')
<div class="container-fluid">
	<h1>Lista de Muestras Camiones</h1>
	<h4> <a href="{{ route('muestrascamion.create') }}">Añadir una muestra</a></h4>
	<hr>
	@include('partials.alerts.success')
	@include('partials.alerts.deleted')


	<div class="table-responsive">
		@if($data)
		<table class="table">
			<thead>
				<tr>
					<td>Fecha</td>
					<td>Hora</td>
					<td>Centrifuga</td>
					<td>Entrada</td>
					<td>Salida</td>
					<td>Consigna</td>
					<td>VA(r.p.m)</td>
					<td>VR(r.p.m)</td>
					<td>Par(%)</td>
					<td>Temp Entrada</td>
					<td>Temp Salida</td>
					<td>vibracion</td>
					<td>Caudal Ent</td>
					<td>Marca poli</td>
					<td>Caudal poli</td>
					<td>Aspecto</td>

				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr>
					<td>{{$row->created_at->format('d/m/Y')}}</td>
					<td>{{$row->created_at->format('H:i:s')}}</td>
					<td>{{$row->centrifuga}}</td>
					<td>{{$row->entrada}}</td>
					<td>{{$row->salida}}</td>
					<td>{{$row->consigna}}</td>
					<td>{{$row->va}}</td>
					<td>{{$row->vr}}</td>
					<td>{{$row->par}}</td>
					<td>{{$row->t_entrada}}</td>
					<td>{{$row->t_salida}}</td>
					<td>{{$row->vibracion}}</td>
					<td>{{$row->caudal_ent}}</td>
					<td>{{$row->marcapoli}}</td>
					<td>{{$row->caudal_poli}}</td>
					<td>{{$row->aspecto}}</td>

					<td>
						<a href="{{route('muestrascamion.edit',$row->id)}}" class="btn btn-info">Editar</a>
					</td>
					<td>
						<form action="{{route('muestrascamion.destroy',$row->id)}}" method="post">
							<input name="_method" type="hidden" value="DELETE">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<button type="submit" class="btn btn-danger">Eliminar</button>
						</form>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
	</div>
</div>