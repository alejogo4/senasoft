var dropZoneDocumento = null;

(function($) {
    var form = $("#form");
    form.validate({

        errorPlacement: function errorPlacement(error, element) {
            if ($(element).is("select")) {
                $(element).next().append(error);
            } else {
                element.after(error);
            }
        },
        onfocusout: function(element) {
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

        onStepChanging: function(event, currentIndex, newIndex) {

            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            guardar();
            //alert('Submited');
        },
        onStepChanged: function(event, currentIndex, priorIndex) {

            return true;
        }
    });
})(jQuery);

$(function() {
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


    dropZoneDocumento = new Dropzone("div#proyecto", {
        acceptedFiles: ".xls, .xlsx",
        url: "/",
        autoProcessQueue: false,
        parallelUploads: 1,
        uploadMultiple: false,
        addRemoveLinks: true

    });



})

function guardar() {


    var data = new FormData();

    let proyecto = dropZoneDocumento.getAcceptedFiles();


    if (proyecto.length > 0) {

        let form = $("#form").serializeArray();


        form.forEach(e => {
            data.append(e.name, e.value);
        })

        data.append("proyecto_file", dropZoneDocumento.getQueuedFiles()[0]);


        jQuery.ajax({
            url: '/proyecto',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',

        }).done((respuesta) => {
            Swal.hideLoading();
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
                    text: "Estamos procesando la solicitud",
                    type: 'warning',
                })
            }
        }).fail((error) => {
            Swal.hideLoading();
            Swal.fire({
                title: 'Espera',
                text: "Ocurrió un error inesperado, intenta más tarde. En caso de persistir el error contacta al administrador del sitio",
                type: 'error',
            })
        });

    }

}