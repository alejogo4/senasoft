@extends('layouts.app')

@section("titulo")
Listado de proyectos para la muestra
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
                <h4>Proyectos registrados</h4>
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table id="tabla_registro_proyectos" class="table mb-0">
                        <thead>
                            <tr>
                                <th>Regional</th>
                                <th>Centro</th>
                                <th>Proyecto</th>
                                <th>Evaluación</th>
                                <th>Estado Proyecto</th>
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        $('#tabla_registro_proyectos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: '/proyectos/obtener/registros',
            columns: [{
                    data: 'centro.regional.nombre_regional',
                    name: 'centro.regional.nombre_regional'
                },
                {
                    data: 'nombre_centro',
                    name: 'nombre_centro'
                },
                {
                    data: 'puntaje',
                    name: 'puntaje'
                },
                {
                    data: 'puntaje',
                    name: 'puntaje'
                },
                {
                    data: 'puntaje',
                    name: 'puntaje'
                }
                
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
               
                var opciones = $('td:eq(2)', nRow);
                html = `<a href="/proyecto-file/${aData.arhivo_proyecto_centro}" download>${aData.arhivo_proyecto_centro}</a>`;
                opciones.html(html);

                var puntaje = $('td:eq(3)', nRow);
                puntaje.attr("contenteditable",true);
                puntaje.addClass("point");

                if(aData.puntaje != 0){
                    var buttons = $('td:eq(4)', nRow);
                    if(aData.estado ==  1){
                        buttons.html(`<span class="badge badge-success">Success</span>`);
                    }else{
                        buttons.html(`<span class="badge badge-danger">Danger</span>`);
                    }
                    
                }else{
                    var buttons = $('td:eq(4)', nRow);
                    buttons.html(`<div class="btn-group" role="group" aria-label="Basic example">
                                    <button onclick="revisar(${aData.id_proyecto}, 1,this)" type="button" class="btn btn-success">Aprobar</button>
                                    <button onclick="revisar(${aData.id_proyecto}, 2,this)" type="button" class="btn btn-danger">Rechazar</button>
                                    </div>`);
                }
               
            }
        });

        function revisar(id,estado,element){

            var row = element.parentElement.parentElement.parentElement;
            var puntaje = $(row).find(".point").html();
          
            var data = new FormData();
            data.append('id',id);
            data.append('estado',estado);
            data.append('puntaje',puntaje);

            jQuery.ajax({
            url: '/proyecto/actualizarTabla',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
        

            }).done((respuesta) => {
                if (respuesta.ok) {
                    Swal.fire({
                        title: 'Felicidades',
                        text: respuesta.mensaje,
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    })
                } else {
    
                    Swal.fire({
                        title: 'Espera',
                        text: respuesta.mensaje,
                        type: 'warning',
                    })
                }
                
            }).fail((error) => {
                Swal.hideLoading();
                Swal.fire({
                    title: 'Espera',
                    text: "Ocurrió un error inesperado, intenta más tarde. En caso de persistir el error contacta al administrador del sitio",
                    type: 'error',
                })
            });
    
        }
        

    </script>

    <!-- $('#tabla_proyectos').Tabledit({
        url: '/proyecto/actualizarTabla',
        deleteButton: false,
        columns: {
            identifier: [0, 'id'],
            editable: [

                [3, 'puntaje'],
                [4, 'estado', '{"0": "Aprobado", "1": "No Aprobado"}']
            ]
        },
        buttons: {
            edit: {
                class: 'btn btn-sm btn-primary td-actions',
                html: '<a href="#"><i class="la la-edit p-1 mr-0 text-white"></i></a>',
                action: 'edit'
            },
            delete: {
                class: 'btn btn-sm btn-danger td-actions',
                html: '<a href="#"><i class="la la-close p-1 mr-0 text-white"></i></a>',
                action: 'delete'
            },
            save: {
                class: 'btn btn-success',
                html: 'Save'
            },
            restore: {
                class: 'btn btn-sm btn-warning',
                html: 'Restore',
                action: 'Restore'
            },
            confirm: {
                class: 'btn btn-primary',
                html: 'Confirm'
            }
        },
        onDraw: function() {
            console.log('onDraw()');
        },
        onSuccess: function(data, textStatus, jqXHR) {
            console.log(data);
            Swal.fire({
                title: 'Muy Bien',
                text: "Puntaje actualizado con éxito",
                type: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            })

        },
        onFail: function(jqXHR, textStatus, errorThrown) {
            Swal.hideLoading();
            Swal.fire({
                title: 'Espera',
                text: "Ocurrió un error inesperado, intenta más tarde. En caso de persistir el error contacta al administrador del sitio",
                type: 'error',
            })
        },
        onAlways: function() {

        },
        onAjax: function(action, serialize) {

        }
    }); -->

@endsection
