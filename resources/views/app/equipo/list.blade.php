@extends('layouts.app')

@section('titulo')
Equipos
@endsection

@section("style")
<link rel="stylesheet" href="{{asset('admin/css/datatables/datatables.min.css')}}">
@endsection

@section('content')



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
                html = ` <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_equipo" onclick="mostrar_equipo(${aData.id})">
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

           console.log(respuesta)

        })
    }

</script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
@endsection
