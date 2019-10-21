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
                <th>
                  <!-- {{$f->adjunto}} -->
                  <a title="Descargar adjunto" role="button" class="btn btn-outline-info" href="{{route('downloadFile',['name' => $f->adjunto])}}"><i style="width: 14px;" class="ti-download"></i></a>
                  <button title="Editar adjunto" type="button" class="btn btn-outline-success" onclick="edit({{$f->id}})" data-toggle="modal" data-target="#modalEdit"><i style="width: 14px;" class="ti-pencil-alt"></i></button>
                </th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </button>
    </button>
  </button>
</button>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="error" style="display:none;" class="alert alert-danger" role="alert">
          
        </div>
        <div class="form-group">
          <label for="newFile">Nuevo archivo</label>
          <input id="newFile" type="file" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="btnUpdate">Actualizar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section("script")
<script src="{{ asset('admin/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script src="{{asset('js/validate-es.min.js')}}"></script>
<script src="/vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="/vendor/minimalist-picker/dobpicker.js"></script>
<script src="/vendor/nouislider/nouislider.min.js"></script>
<script src="/vendor/wnumb/wNumb.js"></script>
<script>
  $(document).ready(function() {
    $('#tablaEvaluaciones').dataTable()

  })
</script>
<script>
  function edit(id) {
    $("#btnUpdate").attr('onclick', `update(${id})`)
  }

  function update(id) {
    let data = new FormData()
    data.append('adjunto', $('#newFile')[0].files[0])

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "post",
      url: `/set/file/${id}`,
      data: data,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function(r) {
        if (r.ok) {
          $("#error").hide()
          $("#btn-secondary").click()
          $('#newFile').val('')
          Swal.fire({
            title: 'Éxito',
            text: r.message,
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
          }).then(function() {
            location.reload();
          });
        } else {
          $("#error").html(r.error.adjunto[0])
          $("#error").show()
        }
      }
    });
  }
  function download(name) {
    $.get(`/download/file/${name}`,
      function (r) {
        if(r.error){
          Swal.fire({
            title: 'Error',
            text: r.error,
            type: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
          })
        }
      }
    );
  }
</script>
@endsection