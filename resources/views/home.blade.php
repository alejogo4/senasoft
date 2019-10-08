@extends('layouts.app')

@section("titulo")
Dashboard
@endsection

@section("style")
<link rel="stylesheet" href="{{asset('admin/css/datatables/datatables.min.css')}}">
@endsection

@section('content')

<div class="row">

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="widget widget-25 has-shadow">

            <div class="widget-header d-flex align-items-center">
                <h2>Instructores</h2>
            </div>

            <div class="widget-body">
                <div class="row m-0 align-items-center">
                    <div class="col-xl-12 text-center">
                        <div class="current-weather">
                            <div class="temperature">{{$total_i}}</div>
                            <i class="la la-user"></i>
                            <div class="condition mt-2 mb-5">Instructores registrados</div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                        <div class="weather-next-day">
                            <div class="day">PLANTA</div>
                            <i class="la la-university"></i>
                            <div style="font-size: 2rem;" class="temp mt-2">{{$total_planta}}</div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                        <div class="weather-next-day">
                            <div class="day">CONTRATISTAS</div>
                            <i class="la la-user-secret"></i>
                            <div style="font-size: 2rem;" class="temp mt-2">{{$contratistas}}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="widget widget-25 has-shadow">

            <div class="widget-header d-flex align-items-center">
                <h2>Fases</h2>
                <i class="la la-hourglass-2" style="font-size: 32px; "></i>
            </div>

            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            @foreach($fases as $f)
                            <li>{{$f->nombre}} {!! $f->estado==0?'':'<span class="float-right" style="color: #005c7c;border: #005c7c solid 1px;padding: 0.1rem;width: 70px;text-align: center;border-radius: 1000px;">Activa</span>' !!}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>                
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="widget widget-25 has-shadow">

            <div class="widget-header d-flex align-items-center">
                <h2>Aprendices</h2>
            </div>

            <div class="widget-body" style="height:642.2px">
                <div class="row m-0 align-items-center">
                    <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                        <div class="current-weather">
                            <div class="temperature">{{$total_a}}</div>
                            <i class="la la-users"></i>
                            <div class="condition mt-2 mb-5">Aprendices registrados</div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Total Cupos</th>
                                    <th>Total Registros</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorias as $value)
                                <tr>
                                    <td>{{$value->nombre_categoria}}</td>
                                    <td>{{$value->cupos}}</td>
                                    <td>{{$value->utilizados}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-12">

        <div class="widget widget-07 has-shadow">

            <div class="widget-header bordered d-flex align-items-center">
                <h2>Centros</h2>
                <div class="widget-options">
                    <div class="btn-group" role="group">
                        Total de registros: {{$total}}
                    </div>
                </div>
            </div>


            <div class="widget-body">
                <div class="table-responsive table-scroll padding-right-10"
                    style="max-height: 520px; overflow: hidden; outline: none;" tabindex="5">
                    <table id="tblDashboard" class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Regional</th>
                                <th>Centro</th>
                                <th>Registro</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($centros as $value)
                            <tr>
                                <td>{{$value->nombre_regional}}</td>
                                <td>{{$value->nombre_centro}}</td>
                                <td>
                                    <span style="width:100px;">
                                        <span class="badge-text {{$value->nombres === null ? 'info' : 'success'}}">
                                            {{$value->nombres === null ? "Sin registrar" : "Registrado"}}
                                        </span>
                                    </span>
                                </td>
                                <td>
                                    <span style="width:100px;">
                                        <?php 
                                            $texto = null;
                                            $color = null;
                                            if($value->revision == 0){
                                                $texto = "Sin revisar";
                                                $color = "default";
                                            }else  if($value->revision == 1){
                                                $texto = "En proceso";
                                                $color = "info";
                                            }else if($value->revision == 2){
                                                $texto = "Aprobado";
                                                $color = "success";
                                            }else
                                        ?>
                                        <span class="badge-text {{$color}}">
                                            {{$texto}}
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>



    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                Preparar los Roles ! {{$mensaje}}

                @can('read proyectos')
                <h2>Acceso para evaluador de proyecto</h2>
                <a href="{{route('proyecto_list')}}">Ver Proyectos</a>
                @endcan
                @can('read users')
                <h2>Acceso para moderadores</h2>
                @endcan
                <h2>Acceso para full</h2>
            </div>
        </div>
    </div>
</div>

@endsection


@section("script")
<script src="{{ asset('admin/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/vendors/js/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/datatables/buttons.print.min.js') }}"></script>
<script>
    $(function () {
        $('#tblDashboard').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    })

</script>
@endsection
