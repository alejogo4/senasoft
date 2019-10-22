@extends('layouts.app')

@section("titulo")
Registro de innvitados
@endsection

@section("style")
<link rel="stylesheet" href="/vendor/nouislider/nouislider.min.css">
<!-- Main css -->
<link rel="stylesheet" href="/css/wizard.css">

<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

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

@section('content')
<form method="post" action="/invitados/guardar">
    @csrf
    <div class="card">
        <fieldset>
            <div class="fieldset-content">
                <div class="form-row">
                    <div class="form-group col-md-3 col-sm-3">
                        <label for="">Tipo Documento <b class="text-danger">*</b></label>
                        <select class="form-control" name="tipo_documento" id="tipo_documento" style="width:100%">
                            <option value="">Seleccione</option>
                            <option value="CÉDULA DE CIUDADANÍA">CÉDULA DE CIUDADANÍA</option>
                            <option value="CÉDULA DE EXTRANJERÍA">CÉDULA DE EXTRANJERÍA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Documento <b class="text-danger">*</b></label>
                        <input onkeyup="mayus(this);" type="number" name="documento" id="documento" required />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Nombres <b class="text-danger">*</b></label>
                        <input onkeyup="mayus(this);" type="text" name="nombre" id="nombre" required />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Apellidos <b class="text-danger">*</b></label>
                        <input onkeyup="mayus(this);" type="text" name="apellido" id="apellido" required />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email" class="form-label">Correo</label>
                        <input onkeyup="mayus(this);" type="email" name="correo" id="correo" required />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input onkeyup="mayus(this);" type="text" name="telefono" id="telefono" required />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="text" class="form-label">Ciudad <b class="text-danger">*</b></label>
                        <select name="ciudad" id="ciudad" style="width:100%">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success pull-right">Guardar</button>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </fieldset>

    </div>
</form>
@endsection
@section('script')
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/select2-es.js')}}"></script>
<script>
    $(function () {



        $("#ciudad").select2();

        $.ajax({
            url: "/ciudades.json",
            dataType: 'json'
        }).done(e => {
            $("#ciudad").empty();
            $("#ciudad").append("<option value=''>Seleccione</option>");

            e.forEach(v => {
                $("#ciudad").append(
                    `<option value='${v.Departamento+"-"+v.Ciudad}'>${v.Departamento+"-"+v.Ciudad}</option>`
                    );
            })
        })

        @if(session('status'))
            alert('{{session("status")}}')
        @endif
    })

</script>
@endsection
