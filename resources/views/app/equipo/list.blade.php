@extends('layouts.app')

@section('titulo')
Equipos
@endsection

@section("style")
<link rel="stylesheet" href="{{asset('admin/css/datatables/datatables.min.css')}}">
@endsection

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
                <h4>Listado de centros que han registrado equipos</h4>
            </div>
            <div class="widget-body">
                <table id="tabla_equipos" class="table mb-0">
                    <thead>
                        <tr>
                            <th>Regional</th>
                            <th>Centro</th>
                            <th>Número de Equipos</th>
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
                html = ` <button type="button" class="btn btn-primary" onclick="mostrar_equipo(${aData.id})">
                        Ver Equipos
                    </button>`;
                opciones.html(html);
            }
        });
    });

    function mostrar_equipo(id) {

        $.ajax({
            url: '/equipos/obtener/' + id,
            dataType: 'json',
            type: 'get'
        }).done(function (respuesta) {

            console.log('====================================');
            $('#modal_registro').modal();
            console.log('====================================');

        })
    }

</script>

@endsection
