var dropZoneEps = null;
var dropZoneDocumentos = null;
var dropZoneCertificado = null;
var dropZoneFoto = null;
(function ($) {
    var form = $("#signup-form");
    form.validate({
        // errorPlacement: function errorPlacement(error, element) {
        //     element.after(error);
        // },
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
            previous: 'Atras',
            next: 'Siguiente',
            finish: 'Finalizar',
            current: ''
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            // if (currentIndex === 0) {
            //     form.parent().parent().parent().append('<div class="footer footer-' + currentIndex + '"></div>');
            // }
            // if (currentIndex === 1) {
            //     form.parent().parent().parent().find('.footer').removeClass('footer-0').addClass('footer-' + currentIndex + '');
            // }
            // if (currentIndex === 2) {
            //     form.parent().parent().parent().find('.footer').removeClass('footer-1').addClass('footer-' + currentIndex + '');
            // }
            // if (currentIndex === 3) {
            //     form.parent().parent().parent().find('.footer').removeClass('footer-2').addClass('footer-' + currentIndex + '');
            // }
            // if(currentIndex === 4) {
            //     form.parent().parent().parent().append('<div class="footer" style="height:752px;"></div>');
            // }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            guardar();
            alert('Submited');
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
    Dropzone.prototype.defaultOptions.dictFallbackMessage = "Your browser does not support drag'n'drop file uploads.";
    Dropzone.prototype.defaultOptions.dictFallbackText = "Please use the fallback form below to upload your files like in the olden days.";
    Dropzone.prototype.defaultOptions.dictFileTooBig = "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.";
    Dropzone.prototype.defaultOptions.dictInvalidFileType = "You can't upload files of this type.";
    Dropzone.prototype.defaultOptions.dictResponseError = "Server responded with {{statusCode}} code.";
    Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancel upload";
    Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "Are you sure you want to cancel this upload?";
    Dropzone.prototype.defaultOptions.dictRemoveFile = "Remove file";
    Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "You can not upload any more files.";

    Dropzone.autoDiscover = false

    dropZoneEps = new Dropzone("div#cedulas", {
        acceptedFiles: "application/pdf",
        url: "/",
        autoProcessQueue: false,
        parallelUploads: 20,
        uploadMultiple: true,
        addRemoveLinks: true
    });
    dropZoneDocumento = new Dropzone("div#eps", {
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
        url : "/ciudades.json",
        dataType : 'json'
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
    let images = dropZoneEps.getAcceptedFiles();

    images.forEach((e, i) => {
        data.append("archivo[]", e);
    });

    jQuery.ajax({
        url: '/registro',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST'
    });

    // let form = $("#signup-form").serializeArray();

    // console.log(form)

}
