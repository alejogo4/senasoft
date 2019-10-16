@extends('layouts.app')

@section("titulo")
Listado de Fases Evaluadas
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
        <h4>Listado Fases Evaluadas</h4>
      </div>
      <div class="widget-body">
        <div class="table-responsive">
          <table id="tablaEvaluaciones" class="table mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Grupo</th>
                <th>Fase</th>
                <th>Puntaje</th>
                <th>Archivo Adjunto</th>
              </tr>
            </thead>
            <tbody>
                @foreach($evaluacion as $key =>$f)
                <tr>
                    <th>{{($key+1)}}</th>
                    <th>{{$f->categoria->nombre_categoria}}</th>
                    <th>{{$f->grupo->nombre}}</th>
                    <th>{{$f->fase->nombre}}</th>
                    <th>{{$f->puntaje}}</th>
                    <th>{{$f->adjunto}}</th>
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
<script src="{{ asset('admin/vendors/js/datatables/datatables.min.js') }}"></script>
<script>
$(document).ready(function () { 
    $('#tablaEvaluaciones').dataTable()
 })
</script>
@endsection