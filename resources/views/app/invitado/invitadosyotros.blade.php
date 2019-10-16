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
Invitados, organizadores y empresas
@endsection

@section('opciones')
<div class="row">
    <div class="col-6">
        <a href="#" onclick="escarapelas()" class="btn btn-success">Generar escarapelas</a>
    </div>
    <div class="col-6">
        <select name="" id="ddlEscarapela" class="form-control" onchange="ver_instructores(this)">
            <option value="23">Invitados</option>
            <option value="22">Organizadores</option>
            <option value="24">Empresas</option>
        </select>
    </div>
</div>

@endsection

@section('content')

<div class="row">
    <div class="col-xl-12">
        <!-- Example 01 -->
        <div class="widget has-shadow" id="instructores">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>
                    Registros
                </h4>
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
                                <th>Código de Barras</th>
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
    var dt = null;
    $(function () {

        dt = $('#tabla_registros').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: '/invitados/obtener/23',
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
                    data: 'centro.regional.nombre_regional',
                    name: 'centro.regional.nombre_regional'
                },
                {
                    data: 'centro.nombre_centro',
                    name: 'centro.nombre_centro'
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
                    data: 'id',
                    name: 'id'
                }
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var opciones = $('td:eq(1)', nRow);
                html = '<a href="/archivos/fotos/' + aData.foto +
                    '" data-lightbox="roadtrip"><img style="width: 50%;" src="/archivos/fotos/' +
                    aData.foto +
                    '" class="figure-img img-fluid rounded"></a>';
                opciones.html(html);

                var opciones2 = $('td:eq(7)', nRow);
                html = `<img width="250" src="${aData.qr}" alt="">`;
                opciones2.html(html);     
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

    let ver_instructores = (e) => {
        let id = $(e).val();
        dt.ajax.url("/invitados/obtener/" + id).load();
    }

    function escarapelas(){
        let id = $("#ddlEscarapela option:selected").val();
        window.open("/registros/escarapela/categoria/"+id);
    }

</script>
@endsection
