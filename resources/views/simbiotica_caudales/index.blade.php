@extends('layouts.app')
<div class="container-fluid ">
	<h1>Caudales simbiótica</h1>
	<h4> <a href="{{ route('simbiotica.create') }}">Introducir caudales de simbiótica</a></h4>
	
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
					<td>Caudal(m³)</td>
					<td>Totalizado</td>		
					<td>incidencias</td>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr><td>{{$row->user->name}}</td>
					<td>{{$row->hora->format('d-m-Y')}}</td>
					<td>{{$row->hora->format('H:i')}}</td>
					<td>{{$row->caudal}}</td>
					<td>{{$row->totalizado}}</td>
					<td><textarea class="textareapers" readonly rows="2">{{$row->incidencias}}</textarea></td>
					
					
					<td >
						<div class="btn-group">
							<a href="{{route('simbiotica.edit',$row->id)}}" class="btn btn-info btn-xs">Editar</a>

							<form action="{{route('simbiotica.destroy',$row->id)}}" method="post">
								<input name="_method" type="hidden" value="DELETE">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
							</div>
						</form>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		@endif
	</div>
</div>