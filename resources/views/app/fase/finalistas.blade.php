@extends('layouts.app')

@section("titulo")
Fase 4
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
                <h4>Grupos que pasaran a la fase 4</h4>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12" id="buttonShow" style="text-align: center;">
                        <button type="button" class="section-lyla btn btn-formato btn-lg btn-primary " onclick="finalistas()">Generar listado</button>
                    </div>
                    <div class="col-md-12" id="categoriasContenido" style="display:none;">
                        <ul class="nav nav-tabs" id="categorias" role="tablist">

                        </ul>
                        <div class="tab-content" id="contenidoCategorias">
                        </div>
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
    function finalistas() {
        $.ajax({
            type: "get",
            url: "/get/finalistas",
            dataType: "json",
            cache: false,
            success: function(r) {

                $("#buttonShow").hide()
                r.categorias.forEach(function(e, i) {
                    $("#categorias").append(`<li class="nav-item">
                                                <a class="nav-link" id="${e.id}-tab" data-toggle="tab" href="#cat_${e.id}" role="tab" aria-controls="profile">${e.nombre_categoria}</a>
                                            </li>`)
                    $("#contenidoCategorias").append(`  <div class="tab-pane fade" id="cat_${e.id}" role="tabpanel" aria-labelledby="${e.nombre_categoria}-tab">
                                                            <table class="table mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="60%">Nombre</th>
                                                                        <th width="20%">Puntos</th>
                                                                        <th width="20%">Opciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>`)
                })
                $('#categoriasContenido').slideToggle(1500)

                console.log(r.grupos)
                r.grupos.forEach(function(e, i) {
                    $(`#cat_${e.categoria_id} > table > tbody`).append(`<tr>
                                                                            <td>${e.nombre}</td>
                                                                            <td>${e.total_puntos}</td>
                                                                            <td><button>...</button></td>
                                                                        </tr>`)
                })
            }
        });
    }
</script>
@endsection