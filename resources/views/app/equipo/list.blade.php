@extends('layouts.app')

@section('content')
<!-- Modal -->
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="widget-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tabla_equipo" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Categoría</th>
                                            <th>Placa</th>
                                            <th>Serial</th>
                                            <th>Modelo</th>
                                            <th>Descripción</th>
                                            <th>Descripción Actual</th>
                                            <th>Atributos</th>
                                            <th>Especificaciones técnicas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <td>{{$equipo->nombre_regional}}</td>
                                <td>{{$equipo->nombre_centro}}</td>
                                <td>{{$equipo->numero}}</td>
                                <td>
                                    <div class="col-md-3">
                                        <button type="button" class="section-lyla btn btn-formato btn-lg" onclick="mostrar_equipo({{$equipo->id}})">
                                            Ver
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section("script")

    <script>
        
        function mostrar_equipo(id){

            $.ajax({
                url: '/equipo/obtener/'+id,
                dataType: 'json',
                type: 'get'
            }).done((respuesta)=>{
                
            })
        }
    
    </script>

@endsection