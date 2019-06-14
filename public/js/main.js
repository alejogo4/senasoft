(function ($) {
    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            email: {
                email: true
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
            alert('Submited');
        },
        onStepChanged: function (event, currentIndex, priorIndex) {

            return true;
        }
    });
})(jQuery);

function validar_tipo_persona(){
    var tipo_persona = $("input[name='tipo_persona']:checked").val();
    switch(tipo_persona){
        case "1":
            $("#categoria").show();
        break;
        case "2":
            $("#categoria").hide();
        break;
    }
}