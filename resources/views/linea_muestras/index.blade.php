@extends('layouts.app') @section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">Panel Heading</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered table-list " id=grid>
                        <thead>
                            <tr>
                                <th><em class="fa fa-cog"></em></th>
                                <th class="hidden-xs">ID</th>
                                <th>Linea</th>
                                <th>Fecha y Hora</th>
                                <th>Entrada</th>
                                <th>Salida</th>
                                <th>TT1</th>
                                <th>TT2</th>
                                <th>TT3</th>
                                <th>TT4</th>
                                <th>Bomba Hz</th>
                                <th>Vueltas Bomba</th>
                                <th>Niv. Silo</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($muestras as $muestra)
                            <tr>
                                <td align="center">
                                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                </td>
                                <td class="hidden-xs">1</td>
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

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="panel-footer">
                    <div class="row">

                        <div class="col col-xs-4">Page 1 of 5
                        </div>
                        <div class="col col-xs-8">
                            <ul class="pagination hidden-xs pull-right" id="grid">
                            </ul>
                            <ul class="pagination visible-xs pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div>

    </div>
</div>