@extends('layouts.app')

@section("titulo")
Puntos
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
                <h4>Grupos por categoría</h4>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-4" style="text-align: center;">
                        <div class="for-group">
                            <select name="categoria" id="categoria" class="form-control">
                                @foreach($categorias as $c)
                                <option value="{{$c->id}}">{{$c->nombre_categoria}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="section-lyla btn btn-formato btn-lg btn-primary " onclick="list()">Generar Listado</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-12">
                        <br>
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="50%">Nombre</th>
                                    <th width="20%">Puntos</th>
                                    <th width="20%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script src="{{ asset('admin/vendors/js/datatables/datatables.min.js') }}"></script>
<script>
    function list() {
        let categoria = $("#categoria").val()
        $("#tableBody").html('')
        $.get(`/get/points/${categoria}`, function(r) {
            console.log(r.data)
            r.data.forEach(function(e,i) {
                $(`#tableBody`).append(`<tr>
                                    <td>${i+1}</td>
                                    <td>${e.nombre}</td>
                                    <td><b>${e.total_puntos}</b> pts</td>
                                    <td><button>...</button></td>
                                </tr>`)
            })

        });
    }
</script>
@endsection