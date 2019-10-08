@extends('layouts.app')

@section("style")
<link rel="stylesheet" href="{{asset('admin/css/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="/admin/js/components/lightbox2/css/lightbox.min.css">
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
@endsection
@section('titulo')
Activación de Fases
@endsection





@section('opciones')

@endsection

@section('content')

<div class="row">
  <div class="col-xl-12">
    <!-- Example 01 -->
    <div class="widget has-shadow" id="instructores">
      <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Inicio Fases</h4>
      </div>
      <form action="" class="widget-body form-control">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="" class="col-md-2 col-form-label">Fase 1</label>
              <div class="col-md-8">
                <input type="text" class="form-control date" id="fase-1">
              </div>
              <div class="col-md-2">

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="" class="col-md-2 col-form-label">Fase 2</label>
              <div class="col-md-8">
                <input type="text" class="form-control date" id="fase-2">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="" class="col-md-2 col-form-label">Fase 3</label>
              <div class="col-md-8">
                <input type="text" class="form-control date" id="fase-3">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="" class="col-md-2 col-form-label">Fase 4</label>
              <div class="col-md-8">
                <input type="text" class="form-control date" id="fase-4">
              </div>
            </div>
          </div>
        </div>

        <br>
        <div class="row">
          <div class="col-md-12" style="text-align: center;">
            <button type="button" class="section-lyla btn btn-formato btn-lg btn-primary " onclick="activate()">Aplicar Fechas</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection

@section("script")
<script src="{{ asset('admin/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="/admin/js/components/lightbox2/js/lightbox.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
  $(function() {
    $('.date').daterangepicker({
      timePicker: true,
      timePicker24Hour:true,
      startDate: "2019/10/22",
      endDate: "2019/10/25",
      minDate: "2019/10/22",
      maxDate: "2019/10/25",
      locale: {
        format: "YYYY-MM-DD H:mm",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
      }
    });
  });
  function getValues() {
    let data = []
    $("#fase-1").val()==''? '' : data.push($("#fase-1").val())
    $("#fase-2").val()==''? '' : data.push($("#fase-2").val())
    $("#fase-3").val()==''? '' : data.push($("#fase-3").val())
    $("#fase-4").val()==''? '' : data.push($("#fase-4").val())

    return data
  }
  function activate() {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/activate/phases',
      type: 'post',
      data: {
        'data':getValues()
      },
      dataType: 'json',
      success: function(r) {
        if (r.ok) {
          alert(r.message)
        } else {
          alert(r.error)
        }
      }
    })
  }
</script>
@endsection