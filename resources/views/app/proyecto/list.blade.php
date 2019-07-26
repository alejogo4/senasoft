@extends('layouts.app')

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
                            <table id="tabla_proyectos" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Centro</th>
                                        <th>Proyecto</th>
                                        <th>Evaluación</th>
                                        <th>Estado Proyecto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proyectos as $proyecto)
                                        <tr>
                                            <td>{{$proyecto->id_proyecto}}</td>
                                            <td>{{$proyecto->nombre_centro}}</td>
                                            <td><a href="{{url('/proyecto-file/'.$proyecto->arhivo_proyecto_centro)}}" download>{{$proyecto->arhivo_proyecto_centro}}</a></td>
                                            <td>{{$proyecto->puntaje}}</td>
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
<script src="{{asset('admin/js/components/tabledit/tabledit.js')}}"></script>
@endsection