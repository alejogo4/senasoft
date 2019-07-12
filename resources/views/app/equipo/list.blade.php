@extends('layouts.app')

@section('content')

<!-- Modal -->
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <img src="/images/instructivo_equipos.JPG" alt="Recomendaciones Instructivo" width="100%">
            </div>
        </div>
    </div>
</div>
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
                                            <button type="button" class="section-lyla btn btn-formato btn-lg" data-toggle="modal" data-target="#modal_registro">
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
