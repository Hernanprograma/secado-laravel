@extends('layouts.app')
<div class="container-fluid ">
	<h1>Consumos de gas</h1>
	<h4> <a href="{{ route('gasconsumo.create') }}">Introducir consumos de gas</a></h4>
	
	@include('partials.alerts.success')
	@include('partials.alerts.deleted')
	<div class="table-responsive">
		@if($data)
		<table class="table">
			<thead>
				<tr>
				<td>Operario</td>
					<td>Fecha</td>
					<td>Hora</td>
					<td>Lectura(m³)</td>
					<td>Vb(Nm³)</td>
					<td>Vm(m³)</td>
					<td>Lectura(m³)</td>
					<td>Vbt(Nm³)</td>
					<td>Vmt(m³)</td>
					<td>Lectura(m³)</td>
					<td>Vbt(Nm³)</td>
					<td>Vmt(m³)</td>


				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr><td>{{$row->user->name}}</td>
					<td>{{$row->created_at->format('d/m/Y')}}</td>
					<td>{{$row->created_at->format('H:i:s')}}</td>
					<td>{{$row->receptora_lectura}}</td>
					<td>{{$row->receptora_vb}}</td>
					<td>{{$row->receptora_vm}}</td>
					<td>{{$row->caldera}}</td>
					<td>{{$row->caldera_vbt}}</td>
					<td>{{$row->caldera_vmt}}</td>
					<td>{{$row->coogeneracion_lectura}}</td>
					<td>{{$row->coogeneracion_vbt}}</td>
					<td>{{$row->coogeneracion_vmt}}</td>






					<td>
						<a href="{{route('gasconsumo.edit',$row->id)}}" class="btn btn-info">Editar</a>
					</td>
					<td>
						<form action="{{route('gasconsumo.destroy',$row->id)}}" method="post">
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