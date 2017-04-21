@extends('layouts.app') 
<div class="contenido">
    <div class="container-fluid ">
        <h1>Lista Muestras de linea</h1>
        <h4> <a href="{{ route('lineamuestras.create') }}">Añadir una muestra</a></h4>
        <hr>
        @include('partials.alerts.success')
        @include('partials.alerts.deleted')


        <div class="table-responsive">
            @if($muestras)
            <table class="table">
                <thead>
                    <tr>
                        <td>Operario</td>
                        <td>Linea</td>
                        <td>Fecha y Hora</td>
                        <td>Entrada</td>
                        <td>Salida</td>
                        <td>TT1</td>
                        <td>TT2</td>
                        <td>TT3</td>
                        <td>TT4</td>
                        <td>Bomba Hz</td>
                        <td>Vueltas Bomba</td>
                        <td>Niv. Silo</td>


                    </tr>
                </thead>
                <tbody>
                    @foreach($muestras as $muestra)
                    <tr>
                        <td>{{ $muestra->user->name}}</td>
                        <td>{{ $muestra->linea }}</td>
                        <td>{{ $muestra->created_at }}</td>
                        <td>{{ $muestra->sequedadentrada }}</td>
                        <td>{{ $muestra->sequedadsalida }}</td>
                        <td>{{ $muestra->tt1 }}</td>
                        <td>{{ $muestra->tt2 }}</td>
                        <td>{{ $muestra->tt3 }}</td>
                        <td>{{ $muestra->tt4 }}</td>
                        <td>{{ $muestra->herziosbomba }}</td>
                        <td>{{ $muestra->vueltasbomba }}</td>
                        <td>{{ $muestra->nivelsilo }}</td>


                        <td>
                            <a href="{{route('lineamuestras.edit',$muestra->id)}}" class="btn btn-info">Editar</a>
                        </td>
                        <td>
                            <form action="{{route('lineamuestras.destroy',$muestra->id)}}" method="post">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                </tbody>

                @endforeach
            </table>
            {{$muestras->links()}}

            @endif

        </div>
    </div>
</div>
<div>