var dropZoneEps = null;
var dropZoneDocumentos = null;
var dropZoneCertificado = null;
var dropZoneFoto = null;
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
            previous: 'Atras',
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
            alert('Submited');
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

    dropZoneEps = new Dropzone("div#cedulas", {
        acceptedFiles: "application/pdf",
        url: "/",
        autoProcessQueue: false,
        parallelUploads: 20,
        uploadMultiple: true,
        addRemoveLinks: true
    });
    dropZoneDocumentos = new Dropzone("div#eps", {
        acceptedFiles: "application/pdf",
        url: "/",
        autoProcessQueue: false,
        parallelUploads: 20,
        uploadMultiple: true,
        addRemoveLinks: true
    });
    dropZoneCertificado = new Dropzone("div#certificado", {
        acceptedFiles: "application/pdf",
        url: "/",
        autoProcessQueue: false,
        parallelUploads: 20,
        uploadMultiple: true,
        addRemoveLinks: true
    });
    dropZoneFoto = new Dropzone("div#foto", {
        acceptedFiles: "image/*",
        url: "/",
        autoProcessQueue: false,
        parallelUploads: 20,
        uploadMultiple: true,
        addRemoveLinks: true
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
})

function guardar() {

    var data = new FormData();

    let eps = dropZoneEps.getAcceptedFiles();
    let documentos = dropZoneDocumentos.getAcceptedFiles();
    let certificado = dropZoneCertificado.getAcceptedFiles();
    let foto = dropZoneFoto.getAcceptedFiles();

    if (eps.length > 0 && documentos.length > 0 && certificado.length > 0 && foto.length > 0) {

        let form = $("#signup-form").serializeArray();

        form.forEach(e => {
            data.append(e.name, e.value);
        })

        data.append("foto", $("#fotografia").val());
        data.append("aprendices", $("#aprednices").val());

        eps.forEach((e, i) => {
            data.append("archio_eps[]", e);
        });

        documentos.forEach((e, i) => {
            data.append("archio_documentos[]", e);
        });

        certificado.forEach((e, i) => {
            data.append("archio_certificado[]", e);
        });

        foto.forEach((e, i) => {
            data.append("archio_foto[]", e);
        });

        jQuery.ajax({
            url: '/registro',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST'
        });

    }

}