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
Consultar Fases a Evaluadas
@endsection

@section('content')

<div class="row">
  <div class="col-xl-12">
    <!-- Example 01 -->
    <div class="widget has-shadow" id="cargaFases">
      <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Consulta de Fases</h4>
      </div>
      <form action="" id="#form" enctype="multipart/form-data" class="widget-body form-control">
        <div class="fieldset-content">
          <div class="form-row">
            <div class="row col-md-12">
              <div class="form-group col-md-4 col-sm-4">
                <label for="" class="col-md-2 col-form-label">Categoria<b class="text-danger">*</b></label>
                <select onchange="listar_grupos(this)" class="form-control" name="categoria" id="" required style="height: 52px">
                  <option value="">Seleccione</option>

                  @foreach( $categorias as $value)
                  <option value='{{ $value->id }}'>{{ $value->nombre_categoria }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4 col-sm-4">
                <label for="" class="col-md-2 col-form-label">Fases<b class="text-danger">*</b></label>
                <select class="form-control" name="tipo_documento" id="" required style="height: 52px ">
                  <option value="">Seleccione</option>
                  <option value="fase1">Fase 1</option>
                  <option value="fase2">Fase 2</option>
                  <option value="fase3">Fase 3</option>
                  <option value="fase4">Fase 4</option>
                </select>
              </div>
              <div class="form-group col-md-4 col-sm-4">
                <label for="" class="col-md-2 col-form-label">Grupos<b class="text-danger">*</b></label>
                <select class="form-control" name="grupos" id="grupos" required style="height: 52px">
                  
                </select>
              </div>
              <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade " id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="tabla_equipo" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Fase</th>
                                                    <th>Categoria</th>
                                                    <th>Grupos</th>
                                                    <th>Archivo Adjunto</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="">
                                                <th>No hay equipos.</th>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>
          </div>
        </div>
      </form>
      <div class="col-md-12" style="text-align: center;">
        <button type="button" class="section-lyla btn btn-formato btn-lg btn-primary " onclick="getValues()">Consultar
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
      <script src="/js/consulta_fases.js"></script>

      <script>
        function listar_grupos(e){
          let id_categoria = $(e).val();

          $.ajax({
            url: '/fase/grupo/'+id_categoria,
            dateType:'json',
            type:'get'
          }).done(respuesta=>{
            $("#grupos").empty();
            $("#grupos").append('<option value="">Seleccione</option>');

            for(let item of respuesta)  {
              $("#grupos").append(`<option value="${item.id}">${item.nombre}</option>`);
            }

          })
        }
      
      </script>
      @endsection