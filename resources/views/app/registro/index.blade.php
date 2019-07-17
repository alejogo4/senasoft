@extends('layouts.app')

@section("style")
<link rel="stylesheet" href="{{asset('admin/css/datatables/datatables.min.css')}}">
@endsection

@section('content')

        <div class="row">
            <div class="col-xl-12">
                <!-- Example 01 -->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Instructores registrados</h4>
                    </div>
                    <div class="widget-body">
                        <div class="table-responsive">
                            <table id="tabla_registros" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 100px;">Foto</th>
                                        <th>Regional</th>
                                        <th>Centro</th>
                                        <th>N Documento</th>
                                        <th>Nombres</th>
                                        <th>Fecha Registro</th>
                                        <th>Aprendices</th>
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
<script>
    function format ( d ) {
        return 'Full name: '+d.first_name+' '+d.last_name+'<br>'+
            'Salary: '+d.salary+'<br>'+
            'The child row can contain any data you wish, including links, images, inner tables etc.';
    }

    $(function () {

        $('#tabla_registros').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: '/registros/obtener',
            columns: [
                {
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ""
                },
                { data: 'id', name: 'id' },
                { data: 'centro.nombre_centro', name: 'centro.nombre_centro' },
                { data: 'centro.regional.nombre_regional', name: 'centro.regional.nombre_regional' },
                { data: 'nombres', name: 'nombres' },
                { data: 'apellidos', name: 'apellidos' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' }
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var opciones = $('td:eq(1)', nRow);
                html = aData.nombre + '<td><img style="width: 50%;" src="/archivos/fotos/'+aData.foto+'" class="figure-img img-fluid rounded"></td>';
                opciones.html(html);
            }
        });


        var detailRows = [];
        
        $('#tabla_registros tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                row.child( format( row.data() ) ).show();

                // Add to the 'open' array
                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );

        // On each draw, loop over the `detailRows` array and show any child rows
        dt.on( 'draw', function () {
            $.each( detailRows, function ( i, id ) {
                $('#'+id+' td.details-control').trigger( 'click' );
            } );
        } );

        //                       
    });
</script>
@endsection