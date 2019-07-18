@extends('layouts.app')

@section("style")
<link rel="stylesheet" href="{{asset('admin/css/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="/admin/js/components/lightbox2/css/lightbox.min.css">
<style>
    td.details-control {
        cursor: pointer;
        display: inline-block;
        font: normal normal normal 24px/1 "LineAwesome";
        font-size: inherit;
        text-decoration: inherit;
        text-rendering: optimizeLegibility;
        text-transform: none;
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        font-smoothing: antialiased;
        margin-top: 50%;
    }

    td.details-control::before {
        content: "\f2c3";
        color: green;
        font-size: 24px;
    }

    tr.details td.details-control::before {
        content: "\f343";
        color: red;
        font-size: 24px;
    }

</style>
@endsection

@section('titulo')
Registros de Instructores y Aprendices
@endsection

@section('opciones')
<a tarde="_blank" href="/registros/exportar/excel" class="btn btn-success"><i style="font-size: 24px" class="la la-file-excel-o"></i>Descargar</a>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-12">
        <!-- Example 01 -->
        <div class="widget has-shadow" id="instructores">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Instructores registrados</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table id="tabla_registros" class="table mb-0">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="width: 100px;">Foto</th>
                                <th>Regional</th>
                                <th>Centro</th>
                                <th>N Documento</th>
                                <th>Nombres</th>
                                <th>Fecha Registro</th>
                                <th>Revisión</th>
                                <th>Aprendices</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="widget has-shadow" id="aprendices" style="display: none">
            <div class="widget-header bordered no-actions">
                <h4>
                    <span>Aprendices del centro <span id="centro"></span></span>
                    <span style="float: right"><a href="#" onclick="ver_instructores()">Ver Instructores</a></span>
                </h4>

            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table id="tabla_aprendices" class="table">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Foto</th>
                                <th>Categoría</th>
                                <th>N Documento</th>
                                <th>Nombres</th>
                                <th>Fecha Nacimiento</th>
                                <th>Ficha</th>
                                <th>Correo</th>
                                <th>Correo Alterno</th>
                                <th>Teléfono</th>
                                <th>Teléfono Alterno</th>
                                <th>Ciudad</th>
                                <th>RH</th>
                                <th>EPS</th>
                                <th>Talla de Camisa</th>
                                <th>Alergias</th>
                                <th>Enfermedades</th>
                                <th>Medicamentos</th>
                                <th>Archivo Documento</th>
                                <th>Archivo EPS</th>
                                <th>Archivo Certificado Estudio</th>
                                <th>Revisar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section("script")
<script src="{{ asset('admin/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="/admin/js/components/lightbox2/js/lightbox.min.js"></script>
<script>
    var aprendices = null;
    $(function () {

        var dt = $('#tabla_registros').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: '/registros/obtener',
            columns: [{
                    "class": "details-control",
                    "orderable": false,
                    "data": null,
                    "defaultContent": ""
                },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'centro.nombre_centro',
                    name: 'centro.nombre_centro'
                },
                {
                    data: 'centro.regional.nombre_regional',
                    name: 'centro.regional.nombre_regional'
                },
                {
                    data: 'documento',
                    name: 'documento'
                },
                {
                    data: 'nombres',
                    name: 'nombres'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'revision',
                    name: 'revision'
                },
                {
                    data: 'id',
                    name: 'id'
                }
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var opciones = $('td:eq(1)', nRow);
                html = '<a href="/archivos/fotos/' + aData.foto +
                    '" data-lightbox="roadtrip"><img style="width: 50%;" src="/archivos/fotos/' + aData.foto +
                    '" class="figure-img img-fluid rounded"></a>';
                opciones.html(html);

                var opciones = $('td:eq(8)', nRow);
                html =
                    `<a href="#" onclick="ver_aprendices(` + aData.centro_id + `, '` + aData.centro
                    .nombre_centro +
                    `')" class="btn btn-primary"><i style="margin:0" class="la la-users"></i></a>`;
                opciones.html(html);

                var opciones = $('td:eq(7)', nRow);
                if (aData.revision == 0) {
                    html = `<span class="badge badge-secondary">Sin Revisar</span>`;
                } else if (aData.revision == 1) {
                    html = `<span class="badge badge-success">Aprobado</span>`;
                } else if (aData.revision == 2) {
                    html = `<span class="badge badge-warning">En Revisión</span>`;
                }
                opciones.html(html);
            }
        });

        var detailRows = [];

        $('#tabla_registros tbody').on('click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);

            if (row.child.isShown()) {
                tr.removeClass('details');
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice(idx, 1);
            } else {
                tr.addClass('details');
                row.child(format(row.data())).show();

                // Add to the 'open' array
                if (idx === -1) {
                    detailRows.push(tr.attr('id'));
                }
            }
        });

        // On each draw, loop over the `detailRows` array and show any child rows
        dt.on('draw', function () {
            $.each(detailRows, function (i, id) {
                $('#' + id + ' td.details-control').trigger('click');
            });
        });

        aprendices = $('#tabla_aprendices').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: '/registros/obtener/aprendices/0',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'categoria.nombre_categoria',
                    name: 'categoria.nombre_categoria'
                },
                {
                    data: 'documento',
                    name: 'documento'
                },
                {
                    data: 'nombres',
                    name: 'nombres'
                },
                {
                    data: 'fecha_nacimiento',
                    name: 'fecha_nacimiento'
                },
                {
                    data: 'ficha',
                    name: 'ficha'
                },
                {
                    data: 'correo_principal',
                    name: 'correo_principal'
                },
                {
                    data: 'correo_alterno',
                    name: 'correo_alterno'
                },
                {
                    data: 'telefono',
                    name: 'telefono'
                },
                {
                    data: 'otro_telefono',
                    name: 'otro_telefono'
                },
                {
                    data: 'ciudad',
                    name: 'ciudad'
                },
                {
                    data: 'rh',
                    name: 'rh'
                },
                {
                    data: 'eps',
                    name: 'eps'
                },
                {
                    data: 'talla_camisa',
                    name: 'talla_camisa'
                },
                {
                    data: 'alergias',
                    name: 'alergias'
                },
                {
                    data: 'enfermedades',
                    name: 'enfermedades'
                },
                {
                    data: 'medicamento_consume',
                    name: 'medicamento_consume'
                },
                {
                    data: 'arhivo_documento',
                    name: 'arhivo_documento'
                },
                {
                    data: 'arhivo_certificado_eps',
                    name: 'arhivo_certificado_eps'
                },
                {
                    data: 'arhivo_constancia_estudio',
                    name: 'arhivo_constancia_estudio'
                },
                {
                    "orderable": false,
                    "data": null,
                    "defaultContent": ""
                },
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var opciones = $('td:eq(0)', nRow);
                html = '<a href="/archivos/fotos/' + aData.foto +
                    '" data-lightbox="roadtrip"><img style="width: 50%;" src="/archivos/fotos/' + aData.foto +
                    '" class="figure-img img-fluid rounded"></a>';
                opciones.html(html);

                var opciones = $('td:eq(17)', nRow);
                html =
                    `<a href="#" onclick="abrir_documento('${aData.arhivo_documento}', 'documentos')" class="btn btn-primary"><i style="margin:0" class="la la-download"></i></a>`;
                opciones.html(html);

                var opciones = $('td:eq(18)', nRow);
                html =
                    `<a href="#" onclick="abrir_documento('${aData.arhivo_certificado_eps}', 'eps')" class="btn btn-primary"><i style="margin:0" class="la la-download"></i></a>`;
                opciones.html(html);

                var opciones = $('td:eq(19)', nRow);
                html =
                    `<a href="#" onclick="abrir_documento('${aData.arhivo_constancia_estudio}', 'certificados')" class="btn btn-primary"><i style="margin:0" class="la la-download"></i></a>`;
                opciones.html(html);

                var opciones = $(nRow);
                var revision = $('td:eq(20)', nRow);
                if (aData.revision == 0) {
                    revision.html(`<div class="btn-group" role="group" aria-label="Basic example">
                                    <button onclick="revisar(${aData.id}, 1)" type="button" class="btn btn-success">Aprobar</button>
                                    <button onclick="revisar(${aData.id}, 2)" type="button" class="btn btn-danger">Rechazar</button>
                                    </div>`);
                } else if (aData.revision == 1) {
                    opciones.addClass("table-success");
                    revision.html("N/A");
                } else if (aData.revision == 2) {
                    opciones.addClass("table-danger");
                    revision.html("N/A");
                }

            }
        });
    });

    let format = (d) => {
        return `
            <b>Fecha de Nacimiento: </b>${d.fecha_nacimiento}, <b>Correo: </b>${d.correo_principal}, <b>Teléfono: </b>${d.telefono} <br>
            ${d.correo_alterno != null ? '<b>Correo Alterno: </b>'+d.correo_alterno+'<br>' : ''} 
            ${d.otro_telefono != null ? '<b>Teléfono Alterno: </b>'+d.otro_telefono+'<br>' : ''}
            <b>Tipo Vinculación: </b>${d.tipo_contrato}, <b>Ciudad: </b>${d.ciudad} <br>
            <b>Programa de Formación: </b>${d.programa_formacion} <br>
            <b>Aeropuerto Origen: </b>${d.ciudad_desplazamiento_aereo} <br>
            <b>RH: </b>${d.rh}, <b>EPS: </b>${d.eps}, <b>ARL: </b>${d.arl}, <b>Talla Camisa: </b>${d.talla_camisa} <br>
            <b>Tipo de Alimentación: </b>${d.tipo_alimentacion}, <b>Alergias: </b>${d.alergias==null?'N/A':d.alergias}, <b>Enfermedades: </b>${d.emfermedades==null?'N/A':d.emfermedades}, <b>Medicamentos: </b>${d.medicamento_consume==null?'N/A':d.medicamento_consume}<br>
        `;
    }

    let ver_aprendices = (id, centro) => {
        aprendices.ajax.url("/registros/obtener/aprendices/" + id).load();
        $("#centro").text(centro);
        $("#instructores").hide("slow");
        $("#aprendices").show("slow");
    }

    let abrir_documento = (archivo, carpeta) => {
        window.open(`/archivos/${carpeta}/${archivo}`);
    }

    let ver_instructores = () => {
        $("#centro").text("");
        $("#instructores").show("slow");
        $("#aprendices").hide("slow");
    }

    let revisar = (id, estado) => {
        let e = estado == 1 ? "Aprobar" : "Rechazar";
        Swal.fire({
            title: '¿Seguro?',
            text: "Desea " + e + " al aprendiz",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                $.get(`/registros/modificar/revision/${id}/${estado}`, e => {
                    if (e.ok) {
                        Swal.fire(
                            '!',
                            'Se realizo la modificación!',
                            'success'
                        )
                        aprendices.ajax.reload();
                        dt.ajax.reload();
                    } else {
                        Swal.fire(
                            '!',
                            'Ocurrio un error, intenta mas tarde!',
                            'error'
                        )
                    }

                });

            }
        })
    }

</script>
@endsection
