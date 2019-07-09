@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-xl-12">
                <!-- Example 01 -->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Equipos Registrados</h4>
                    </div>
                    <div class="widget-body">
                        <div class="table-responsive">
                            <table id="tabla_equipo" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Regional</th>
                                        <th>Centro</th>
                                        <th>Equipo</th>
                                        <th>Ver Equipos</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                @foreach($equipos as $equipo)
                               
                                <tr>
                                <td>{{$equipo->regional->nombre_regional}}</td>
                                <td>{{$equipo->centro->nombre_centro}}</td>
                                <td>{{$equipo->id}}</td>  
                                <td><div class="col-md-3">
                                            <button type="button" class="section-lyla btn btn-formato btn-lg" data-toggle="modal" data-target="#modal_recomen">
                                                Ver
                                            </button>
                                </div> </td> 
                                                                            
                                @endforeach
                              
                                                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

@endsection
