@extends('layouts.app')

<div class="container-fluid ">
	<h1>Caudales simbiótica</h1>
	<h4> <a href="{{ route('simbiotica.create') }}">Introducir caudales de simbiótica</a></h4>	



	{!! Form::open(['url' => '/simbiotica/export', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}

	{!! Form::hidden('data', $data) !!}
	{!! Form::hidden('mes', $mes) !!}
	{!! Form::hidden('ano', $ano) !!}


	{!! Form::submit('Informe en Excel', ['class' => 'btn btn-danger ']) !!} 
	{!! Form::close() !!}


	
	@include('partials.alerts.success')
	@include('partials.alerts.deleted')
	<div class="table-responsive">
		@if($data)

		
		<table class="table">
			<thead>

				
				{!! Form::open(['url' => '/simbiotica/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}

				

				{!!Form::selectRange('mes',1,12,$mes) !!}
				{!! Form::selectYear('ano', 2017, 2025,$ano) !!}

				<a href="{{ route('simbiotica.index') }}" class="btn btn-primary">Todo</a>
				{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!} 
				{!! Form::close() !!}

				
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
