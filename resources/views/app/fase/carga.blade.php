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
Cargar Fases a Evaluar
@endsection

@section('content')

<div class="row">
  <div class="col-xl-12">
    <!-- Example 01 -->
    <div class="widget has-shadow" id="cargaFases">
      <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Carga de Archivo</h4>
      </div>
      <form action="" id="#form" enctype="multipart/form-data" class="widget-body form-control">
        <div class="fieldset-content">
          <div class="form-row">
            <div class="row">
              <div class="form-group col-md-6 col-sm-6">
                <label for="" class="col-md-4 col-form-label">Categoria<b class="text-danger">*</b></label>
                <select class="form-control" name="tipo_documento" id="" required>
                  <option value="">Seleccione</option>
                  <option value="algoritmo">Desarrollo Web</option>
                  <option value="web">Algoritmos</option>
                  <option value="web">Desarrollo Movil</option>
                  <option value="web">Videojuegos</option>
                  <option value="web">Animacion 3D</option>
                </select>
              </div>
              <div class="form-group col-md-6 col-sm-6">
                <label for="" class="col-md-4 col-form-label">Fases<b class="text-danger">*</b></label>
                <select class="form-control" name="tipo_documento" id="" required>
                  <option value="">Seleccione</option>
                  <option value="fase1">Fase 1</option>
                  <option value="fase2">Fase 2</option>
                  <option value="fase3">Fase 3</option>
                  <option value="fase4">Fase 4</option>
                </select>
              </div>
              <div class="form-group col-md-6 col-sm-6">
                <label for="" class="col-md-4 col-form-label">Grupos<b class="text-danger">*</b></label>
                <select class="form-control" name="tipo_documento" id="" required>
                  <option value="">Seleccione</option>
                  <option value="fase1">Fase 1</option>
                  <option value="fase2">Fase 2</option>
                  <option value="fase3">Fase 3</option>
                  <option value="fase4">Fase 4</option>
                </select>
              </div>
              <div class="row">
                <h3>Cargar el Formato<b class="text-danger">*</b></h3>
                <div class="col-md-12 hm">
                <div class="panel panel-info">
                            <div class="panel-heading cargaF">
                              <h5>Adjuntar el archivo excel correctamente diligenciado</h5>
                            </div>
                            <div class="panel-body dropzone" id="cargaFase">

                            </div>
                          </div>
                          </div>
              </div>
              
            </div>
          </div>
        </div>
      </form>
      <br>
      
        <div class="col-md-12" style="text-align: center;">
          <button type="button" class="section-lyla btn btn-formato btn-lg btn-primary " onclick="getValues()">Cargar Fase</button>
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
<script src="/js/registro_fases.js"></script>
@endsection