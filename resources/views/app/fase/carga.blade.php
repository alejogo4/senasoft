@extends('layouts.app')

@section("style")
<link rel="stylesheet" href="{{asset('admin/css/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="/admin/js/components/lightbox2/css/lightbox.min.css">
<link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="/vendor/nouislider/nouislider.min.css">
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('css/new.css')}}">
<!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
    -font-smoothing: antialiased;
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
<link rel="stylesheet" href="/css/wizard.css">

<style>
  .section-white {
    padding: 0;
  }

  .section-white.no-padding-bottom,
  .section-grey.no-padding-bottom {
    padding: 0;
  }

  .select2 {
    width: 100% !important;
  }

  .select2-selection {
    height: 50px !important;
  }
</style>

@endsection
@section('titulo')
Cargar Fases a Evaluadas
@endsection

@section('content')

<div class="row">
  <div class="col-xl-12">
    <!-- Example 01 -->
    <div class="widget has-shadow" id="cargaFases">
      <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Carga de Archivo</h4>
      </div>
      <form action="" id="formFases" enctype="multipart/form-data" class="widget-body form-control">
        <div class="fieldset-content">
          <div class="form-row">
            <div class="row">
              <div class="form-group col-md-6 col-sm-6">
                <label for="categorias=" class="col-md-4 col-form-label">Categoria <b class="text-danger">*</b></label>
                <select onchange="listar_grupos(this)" class="form-control" name="categoria" id="categoria" required
                  style="height: 52px">
                  <option value="">Seleccione</option>
                  @foreach( $categorias as $value)
                  <option value='{{ $value->id }}'>{{ $value->nombre_categoria }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6 col-sm-6">
                <label for="nombre_jurado" class="col-md-4 col-form-label">Jurado<b class="text-danger">*</b></label>
                <input type="text" class="form-control" name="nombre_jurado" id="nombre_jurado" required>
              </div>
              <div class="form-group col-md-6 col-sm-6">
                <label for="fecha" class="col-md-4 col-form-label">Fecha<b class="text-danger">*</b></label>
                <input type="date" class="form-control" name="fecha" id="fecha" required>
              </div>
              <div class="form-group col-md-6 col-sm-6">
                <label for="categorias" class="col-md-4 col-form-label">Categoria <b class="text-danger">*</b></label>
                <select onchange="listar_grupos(this)" class="form-control" name="categoria" id="categoria_id" required
                  style="height: 52px">
                  <option value="">Seleccione</option>
                  @foreach( $categorias as $value)
                  <option value='{{ $value->id }}'>{{ $value->nombre_categoria }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6 col-sm-6">
                <label for="" class="col-md-4 col-form-label">Fase<b class="text-danger">*</b></label>
                <select class="form-control" name="fase_id" id="fase_id" required style="height: 52px ">
                  @if(count($fases)>0)
                  <option value="">Seleccione</option>
                  @foreach($fases as $f)
                  <option value="{{$f->id}}">{{$f->nombre}}</option>
                  @endforeach
                  @else
                  <option value="">No hay fases activas</option>
                  @endif
                </select>
              </div>
              <div class="form-group col-md-6 col-sm-6">
                <label for="grupo_id" class="col-md-4 col-form-label">Grupos<b class="text-danger">*</b></label>
                <select class="form-control" name="grupo_id" id="grupo_id" required style="height: 52px">

                </select>
              </div>
              <div class="form-group col-md-6 col-sm-6">
                <label for="" class="col-md-4 col-form-label">Calificación Fase<b class="text-danger">*</b></label>
                <input type="number" class="form-control" name="puntaje" id="puntaje" required>
              </div>
              <div class="form-group col-md-6 col-sm-6">
                <label for="" class="col-md-4 col-form-label">Adjunto<b class="text-danger">*</b></label>
                <input type="file" class="form-control" name="adjunto" id="adjunto" required>
              </div>
            </div>
          </div>
        </div>
      </form>
      <br>

      <div class="col-md-12" style="text-align: center;">
        <button type="button" class="section-lyla btn btn-formato btn-lg btn-primary ">Cargar
          Fase Evaluada</button>
      </div>
      <br>
      <br>


      @endsection

      @section('script')
      <script src="/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
      <script src="/vendor/jquery-validation/dist/additional-methods.min.js"></script>
      <script src="{{asset('js/validate-es.min.js')}}"></script>
      <script src="/vendor/jquery-steps/jquery.steps.min.js"></script>
      <script src="/vendor/minimalist-picker/dobpicker.js"></script>
      <script src="/vendor/nouislider/nouislider.min.js"></script>
      <script src="/vendor/wnumb/wNumb.js"></script>
      <script src="{{asset('js/select2.min.js')}}"></script>
      <script src="{{asset('js/select2-es.js')}}"></script>
      <script src="{{asset('js/dropzone.js')}}"></script>
      <script src="{{asset('js/registro_fases.js')}}"></script>

      <script>
        function listar_grupos(e) {
          let id_categoria = $(e).val();

          $.ajax({
            url: '/fase/grupo/' + id_categoria,
            dateType: 'json',
            type: 'get'
          }).done(respuesta => {
            $("#grupo_id").empty();
            $("#grupo_id").append('<option value="">Seleccione</option>');

            for (let item of respuesta) {
              $("#grupo_id").append(`<option value="${item.id}">${item.nombre}</option>`);
            }

          })
        }
      </script>
      @endsection