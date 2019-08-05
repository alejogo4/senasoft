@extends('layouts.app')

@section("style")
<link rel="stylesheet" href="{{asset('admin/css/datatables/datatables.min.css')}}">
@endsection

@section("modal")
<!-- Modal -->
<div class="modal fade" id="modal_registro_equipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" style="max-width: 90%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Listado de equipos
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="widget-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade " id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Serial</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Descripción Actual</th>
                                                    <th>Atributos</th>
                                                    <th>Especificaciones técnicas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-1">
                                                <th>No hay equipos.</th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Serial</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Descripción Actual</th>
                                                    <th>Atributos</th>
                                                    <th>Especificaciones técnicas</th>


                                                </tr>
                                            </thead>
                                            <tbody id="table-2">
                                                <th>No hay equipos.</th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Serial</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Descripción Actual</th>
                                                    <th>Atributos</th>
                                                    <th>Especificaciones técnicas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-3">
                                                <th>No hay equipos.</th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Serial</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Descripción Actual</th>
                                                    <th>Atributos</th>
                                                    <th>Especificaciones técnicas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-4">
                                                <th>No hay equipos.</th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="tab-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Serial</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Descripción Actual</th>
                                                    <th>Atributos</th>
                                                    <th>Especificaciones técnicas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-5">
                                                <th>No hay equipos.</th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="tab-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Serial</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Descripción Actual</th>
                                                    <th>Atributos</th>
                                                    <th>Especificaciones técnicas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-6">
                                                <th>No hay equipos.</th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-7" role="tabpanel" aria-labelledby="tab-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Serial</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Descripción Actual</th>
                                                    <th>Atributos</th>
                                                    <th>Especificaciones técnicas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-7">
                                                <th>No hay equipos.</th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-8" role="tabpanel" aria-labelledby="tab-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Serial</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Descripción Actual</th>
                                                    <th>Atributos</th>
                                                    <th>Especificaciones técnicas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-8">
                                                <th>No hay equipos.</th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-9" role="tabpanel" aria-labelledby="tab-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Serial</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Descripción Actual</th>
                                                    <th>Atributos</th>
                                                    <th>Especificaciones técnicas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-9">
                                                <th>No hay equipos.</th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-10" role="tabpanel" aria-labelledby="tab-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Serial</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Descripción Actual</th>
                                                    <th>Atributos</th>
                                                    <th>Especificaciones técnicas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-10">
                                                <tr>
                                                    <th>No hay equipos.</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default float-right pull-right" data-dismiss="modal" aria-label="Close">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

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
                    <table id="tabla_equipos" class="table mb-0">
                        <thead>
                            <tr>
                                <th>Regional</th>
                                <th>Centro</th>
                                <th>Equipo</th>
                                <th>Opciones</th>
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


@endsection

@section("script")

<script src="{{ asset('admin/vendors/js/datatables/datatables.min.js') }}"></script>
<script>
    $(function () {
        $('#tabla_equipos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: '/equipos/obtener',
            columns: [{
                    data: 'nombre_regional',
                    name: 'nombre_regional'
                },
                {
                    data: 'nombre_centro',
                    name: 'nombre_centro'
                },
                {
                    data: 'numero',
                    name: 'numero'
                },
                {
                    data: 'id',
                    name: 'id'
                }
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var opciones = $('td:eq(3)', nRow);
                html = ` <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_registro_equipo"  onclick="mostrar_equipo(${aData.id})">
                        Ver Equipos
                    </button>`;
                opciones.html(html);
            }
        });
    });

    function mostrar_equipo(id) {
        $('#myTab').html('');
        $.ajax({
            url: '/equipo/obtener/' + id,
            dataType: 'json',
            type: 'get'
        }).done((respuesta) => {
            console.log(respuesta);
            $("#myTab").empty();
            respuesta.categorias.forEach(function (element, indice) {

                let show = indice == 0 ? 'show active' : '';

                $("#myTab").append('<li class="nav-item">' +
                    '<a class="nav-link '+show+'" id="' + element.nombre_categoria +
                    '-tab" data-toggle="tab" href="#tab-' + element.categoria_id +
                    '" role="tab" aria-controls="tab-' + element.categoria_id +
                    '" aria-selected="true">' + element.nombre_categoria + '</a>' +
                    '</li>');

                $("#tab-" + element.categoria_id).addClass(show);

                let categorias = respuesta.equipos.filter(e=>e.categoria_id == element.categoria_id);
                
                $("#table-" + element.categoria_id).empty();
                categorias.forEach(function (e, i) {
                    
                    $("#table-" + e.categoria_id).append('<tr>' +
                        '<th>' + e.placa_sena + '</th>' +
                        '<th>' + e.serial + '</th>' +
                        '<th>' + e.modelo + '</th>' +
                        '<th>' + e.descripcion + '</th>' +
                        '<th>' + e.descripcion_actual + '</th>' +
                        '<th>' + e.atributos + '</th>' +
                        '<th>' + e.esp_tecnica + '</th>' +
                        '</tr>');
                });

            });

        })
    }

</script>

@endsection
