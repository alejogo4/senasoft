var dropZoneEps = null;
var dropZoneDocumentos = null;
var dropZoneCertificado = null;
var dropZoneFoto = null;

function loading() {
    // Swal.fire({
    //     title: 'Registrando...',
    //     timer: 10000,
    //     onBeforeOpen: () => {
    //         Swal.showLoading()
    //     }
    // })
    Swal.fire({
        imageUrl: '/loading.gif',
        imageAlt: 'Registrando...',
        showCloseButton: false,
        showCancelButton: false,
        showConfirmlButton: false,
    })
}

(function ($) {

    $.validator.addMethod("maxsize", function (value, element, param) {
        if (this.optional(element)) {
            return true;
        }

        if ($(element).attr("type") === "file") {
            if (element.files && element.files.length) {
                for (var i = 0; i < element.files.length; i++) {
                    if ((element.files[i].size) > param * 1000000) {
                        return false;
                    }
                }
            }
        }

        return true;
    }, $.validator.format("El tamaño del archivo no debe exceder {0} megabyte."));


    var form = $("#form");
    form.validate({
        rules: {
            fotografia: {
                required: true,
                accept: "image/jpeg,image/png",
                maxsize: 1,
            },
            aprendices: {
                required: true,
                extension: "xls,xlsx",
            }
        },
        messages: {
            fotografia: {
                accept: "Por favor, introduzca un valor con una extensión png, jpg."
            },
            aprendices: {
                accept: "Por favor, introduzca un valor con una extensión xls, xlsx."
            }
        },
        errorPlacement: function errorPlacement(error, element) {
            if ($(element).is("select")) {
                $(element).next().append(error);
            } else {
                element.after(error);
            }
        },
        onfocusout: function (element) {
            $(element).valid();
        },
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        stepsOrientation: "vertical",
        titleTemplate: '<div class="title"><span class="step-number">#index#</span><span class="step-text">#title#</span></div>',
        labels: {
            previous: 'Atrás',
            next: 'Siguiente',
            finish: 'Finalizar',
            current: ''
        },

        onStepChanging: function (event, currentIndex, newIndex) {

            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            event.preventDefault();
            Swal.fire({
                imageUrl: '/loading.gif',
                imageAlt: 'Registrando...',
                text: 'Registrando...',
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: false,
            })
            guardar();
            return false;
        },
        onStepChanged: function (event, currentIndex, priorIndex) {

            return true;
        }
    });
})(jQuery);



$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    Dropzone.prototype.defaultOptions.dictDefaultMessage = "Arrastra los archivos aquí para subirlos";
    Dropzone.prototype.defaultOptions.dictFallbackMessage = "Su navegador no admite la carga de archivos con arrastrar y soltar.";
    Dropzone.prototype.defaultOptions.dictFallbackText = "Utilice el formulario de reserva a continuación para cargar sus archivos como en los días anteriores.";
    Dropzone.prototype.defaultOptions.dictFileTooBig = "El archivo es demasiado grande ({{filesize}}MiB). Tamaño máximo de archivo: {{maxFilesize}}MiB.";
    Dropzone.prototype.defaultOptions.dictInvalidFileType = "No puedes subir archivos de este tipo.";
    Dropzone.prototype.defaultOptions.dictResponseError = "Servidor respondió con el código {{statusCode}}.";
    Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancelar carga";
    Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "¿Estás seguro de que quieres cancelar esta carga?";
    Dropzone.prototype.defaultOptions.dictRemoveFile = "Remover archivo";
    Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "No puedes subir más archivos.";

    Dropzone.autoDiscover = false

    dropZoneEps = new Dropzone("div#eps", {
        acceptedFiles: "application/pdf",
        url: "/",
        autoProcessQueue: false,
        parallelUploads: 20,
        uploadMultiple: true,
        addRemoveLinks: true,
        maxFilesize: 2
    });

    // dropZoneEps.on("error", function (file) {
    //     this.removeFile(file);
    // });

    dropZoneDocumentos = new Dropzone("div#cedulas", {
        acceptedFiles: "application/pdf",
        url: "/",
        autoProcessQueue: false,
        parallelUploads: 20,
        uploadMultiple: true,
        addRemoveLinks: true,
        maxFilesize: 2
    });
    dropZoneCertificado = new Dropzone("div#certificado", {
        acceptedFiles: "application/pdf",
        url: "/",
        autoProcessQueue: false,
        parallelUploads: 20,
        uploadMultiple: true,
        addRemoveLinks: true,
        maxFilesize: 2
    });
    dropZoneFoto = new Dropzone("div#foto", {
        acceptedFiles: "image/jpeg",
        url: "/",
        autoProcessQueue: false,
        parallelUploads: 20,
        uploadMultiple: true,
        addRemoveLinks: true,
        maxFilesize: 1
    });



    $.ajax({
        url: "/ciudades.json",
        dataType: 'json'
    }).done(e => {
        $("#ciudad").empty();
        $("#ciudad").append("<option value=''>Seleccione</option>");

        e.forEach(v => {
            $("#ciudad").append(`<option value='${v.Departamento+"-"+v.Ciudad}'>${v.Departamento+"-"+v.Ciudad}</option>`);
        })
    })


    $.ajax({
        url: "/aeropuertos.json",
        dataType: 'json'
    }).done(e => {
        $("#aeropuerto_desplazamiento").empty();
        $("#aeropuerto_desplazamiento").append("<option value='No Aplica'>No Aplica</option>");

        e.forEach(v => {
            let valor = v.nombre.toUpperCase() + "-" + v.departamento.toUpperCase();
            $("#aeropuerto_desplazamiento").append(`<option value='${valor}'>${valor}</option>`);
        })
    })
})


function mayus(e) {
    e.value = e.value.toUpperCase();
}

function guardar() {

    var data = new FormData();

    let eps = dropZoneEps.getAcceptedFiles();
    let documentos = dropZoneDocumentos.getAcceptedFiles();
    let certificado = dropZoneCertificado.getAcceptedFiles();
    let foto = dropZoneFoto.getAcceptedFiles();

    if (eps.length > 0 && documentos.length > 0 && certificado.length > 0 && foto.length > 0) {

        let form = $("#form").serializeArray();

        form.forEach(e => {
            data.append(e.name, e.value);
        })

        data.append("foto", $("#fotografia")[0].files[0]);
        data.append("aprendices", $("#aprendices")[0].files[0]);

        eps.forEach((e, i) => {
            data.append("archivo_eps[]", e);
        });

        documentos.forEach((e, i) => {
            data.append("archivo_documentos[]", e);
        });

        certificado.forEach((e, i) => {
            data.append("archivo_certificado[]", e);
        });

        foto.forEach((e, i) => {
            data.append("archivo_foto[]", e);
        });

        jQuery.ajax({
            url: '/registro',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST'
        }).done((respuesta) => {
            // Swal.hideLoading();
            Swal.close()
            if (respuesta.ok) {
                Swal.fire({
                    title: 'Felicidades',
                    text: respuesta.mensaje,
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        location.href = "/";
                    }
                })
            } else {

                Swal.fire({
                    title: 'Espera',
                    text: respuesta.mensaje,
                    type: 'warning',
                })
            }
        }).fail((error) => {
            // Swal.hideLoading();
            Swal.close()
            Swal.fire({
                title: 'Espera',
                text: "Ocurrió un error inesperado, intenta más tarde. En caso de persistir el error contacta al administrador del sitio",
                type: 'error',
            })
        });

    }

}
