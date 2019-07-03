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
                                
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

@endsection
