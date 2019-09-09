@extends('layouts.app')

@section("titulo")
Registro de innvitados
@endsection

@section("style")
<link rel="stylesheet" href="/vendor/nouislider/nouislider.min.css">
<!-- Main css -->
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

@section('content')

<div class="row">
    <div class="col-xl-12">
        <fieldset>
                    <h2>Información</h2>
                    <p class="desc">Ingrese la información requerida <b class="text-danger">*</b> y continúe con el siguiente paso para poder finalizar el registro</p>
                    <div class="fieldset-content">
                        <div class="form-row">
                            <div class="row">
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="">Tipo Documento <b class="text-danger">*</b></label>
                                    <select class="form-control" name="tipo_documento" id="" required>
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
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="email" class="form-label">Correo Principal <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="email" name="correo" id="correo" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class="form-label">Correo Alterno</label>
                                    <input onkeyup="mayus(this);" type="email" name="correo_alterno" id="correo_alterno" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class="form-label">Tipo de Vinculación <b class="text-danger">*</b></label>
                                    <select name="tipo_contrato" id="tipo_contrato" required>
                                        <option value="">Seleccione</option>
                                        <option value="PLANTA">PLANTA</option>
                                        <option value="CONTRATISTA">CONTRATISTA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="telefono" class="form-label">Teléfono Principal <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="text" name="telefono" id="telefono" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="telefono" class="form-label">Teléfono Alterno</label>
                                    <input onkeyup="mayus(this);" type="text" name="telefono_alterno" id="telefono_alterno" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label">Fecha Nacimiento <b class="text-danger">*</b></label>
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="email" class="form-label">Fotografía <b class="text-danger">*</b></label>
                                    <input onkeyup="mayus(this);" type="file" name="fotografia" id="fotografia" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="text" class="form-label">Ciudad <b class="text-danger">*</b></label>
                                    <select name="ciudad" id="ciudad" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="text" class="form-label">Programa de Formación que Imparte <b class="text-danger">*</b></label>
                                    <select name="programa_formacion" id="programa_formacion" required>
                                        <option value="">Seleccione</option>
                                        <option value="TG. EN ANÁLISIS Y DESARROLLO DE SISTEMAS DE INFORMACIÓN">TG. EN ANÁLISIS Y DESARROLLO DE SISTEMAS DE INFORMACIÓN</option>
                                        <option value="TG. EN PRODUCCIÓN DE MULTIMEDIA">TG. EN PRODUCCIÓN DE MULTIMEDIA                                        </option>
                                        <option value="TG. EN GESTIÓN DE REDES DE DATOS">TG. EN GESTIÓN DE REDES DE DATOS</option>
                                        <option value="TG. EN MANTENIMIENTO DE EQUIPOS DE CÓMPUTO, DISEÑO E INSTALACIÓN DE CABLEADO ESTRUCTURADO">TG. EN MANTENIMIENTO DE EQUIPOS DE CÓMPUTO, DISEÑO E INSTALACIÓN DE CABLEADO ESTRUCTURADO</option>
                                        <option value="TG. EN ANIMACIÓN 3D">TG. EN ANIMACIÓN 3D</option>
                                        <option value="TG. EN DESARROLLO DE VIDEOJUEGOS">TG. EN DESARROLLO DE VIDEOJUEGOS</option>
                                        <option value="TG. EN PRODUCCIÓN DE MEDIOS AUDIOVISUALES DIGITALES">TG. EN PRODUCCIÓN DE MEDIOS AUDIOVISUALES DIGITALES</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="text" class="form-label">Aeropuerto de Origen <b class="text-danger">*</b></label>
                                    <select name="aeropuerto_desplazamiento" id="aeropuerto_desplazamiento" required>
                                        <option value="No Aplica">No Aplica</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
    </div>
</div>
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
<!-- <script src="/js/registro_usuarios.js"></script> -->
@endsection

