$(window).on('load', function() {

    "use strict";


    /* ========================================================== */
    /*   Owl Carousel                                             */
    /* ========================================================== */

    $('#owl1').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    $('#owl2').owlCarousel({
        center: true,
        autoplay: true,
        loop: true,
        margin: 40,
        nav: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: false,
                loop: true
            }
        }
    })

    $('#owl10').owlCarousel({
        autoplay: true,
        loop: true,
        margin: 20,
        // nav: false,
        navSpeed: 1000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: false,
                loop: true
            }
        }
    })

    /* ========================================================== */
    /*   Countdown                                                */
    /* ========================================================== */

    $("#countdown").countdown({
            date: "22 october 2019 08:00:00",
            format: "on"
        },

        function() {
            // callback function
        });



    /* ========================================================== */
    /*   Navigation Background Color                              */
    /* ========================================================== */

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 450) {
            $('.navbar-fixed-top').addClass('opaque');
        } else {
            $('.navbar-fixed-top').removeClass('opaque');
        }
    });


    /* ========================================================== */
    /*   Hide Responsive Navigation On-Click                      */
    /* ========================================================== */

    $(".header .navbar-nav li a").on('click', function(event) {
        $(".navbar-collapse").collapse('hide');
    });


    /* ========================================================== */
    /*   Navigation Color                                         */
    /* ========================================================== */

    $('#navbar-collapse-02').onePageNav({
        filter: ':not(.external)'
    });


    /* ========================================================== */
    /*   SmoothScroll                                             */
    /* ========================================================== */

    $(".header .nav li a, a.scrool").on('click', function(e) {

        var full_url = this.href;
        var parts = full_url.split("#");
        var trgt = parts[1];
        var target_offset = $("#" + trgt).offset();
        var target_top = target_offset != null ? target_offset.top : 0;

        $('html,body').animate({
            scrollTop: target_top - 70
        }, 1000);
        return false;

    });


    /* ========================================================== */
    /*   Newsletter                                               */
    /* ========================================================== */

    $('.newsletter-form').each(function() {
        var form = $(this);
        //form.validate();
        form.submit(function(e) {
            if (!e.isDefaultPrevented()) {
                jQuery.post(this.action, {
                    'email': $('input[name="nf_email"]').val(),
                }, function(data) {
                    form.fadeOut('fast', function() {
                        $(this).siblings('p.newsletter_success_box').show();
                    });
                });
                e.preventDefault();
            }
        });
    });


    /* ========================================================== */
    /*   Contact                                                  */
    /* ========================================================== */
    $('#contact-form').each(function() {
        var form = $(this);
        //form.validate();
        form.submit(function(e) {
            if (!e.isDefaultPrevented()) {
                jQuery.post(this.action, {
                    'names': $('input[name="contact_names"]').val(),
                    'email': $('input[name="contact_email"]').val(),
                    'phone': $('input[name="contact_phone"]').val(),
                    'message': $('textarea[name="contact_message"]').val(),
                }, function(data) {
                    form.fadeOut('fast', function() {
                        $(this).siblings('p').show();
                    });
                });
                //e.preventDefault();
            }
        });
    })


    var $select = $("select").select2();

    $select.on('change', function() {
        $(this).trigger('blur');
    });

});

/* ========================================================== */
/*   Popup-Gallery                                            */
/* ========================================================== */
$('.popup-gallery').find('a.popup1').magnificPopup({
    type: 'image',
    gallery: {
        enabled: true
    }
});

$('.popup-gallery').find('a.popup2').magnificPopup({
    type: 'image',
    gallery: {
        enabled: true
    }
});

$('.popup-gallery').find('a.popup3').magnificPopup({
    type: 'image',
    gallery: {
        enabled: true
    }
});

$('.popup-gallery').find('a.popup4').magnificPopup({
    type: 'iframe',
    gallery: {
        enabled: false
    }
});



$(".registro").on("click", function() {
    let url = $(this).attr("url");
    confirmar_codigo(url);
})

$(".formato").on("click", function() {
    url = "files/Ficha Muestra de Proyectos.xlsx";

    location.href = url;
    //name = "Evaluación Proyectos SenaSoft 2019_May 30";

    //downloadURI(url, name);

})


function downloadURI(uri, name) {
    var link = document.createElement("a");
    link.download = name;
    link.href = uri;
    link.click();
}


function confirmar_codigo(url) {


    Swal.fire({
        title: 'Ingresa el código',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'on'
        },
        showCancelButton: true,
        confirmButtonText: 'Validar',
        showLoaderOnConfirm: true,
        preConfirm: (codigo) => {
            return fetch(`/validar/codigo/${codigo}?url=${url}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText)
                    }
                    return response.json();
                }).then(result => {
                    console.log(result);
                    if (result) {

                        if (result.ok) {
                            location.href = url;
                        } else {
                            throw new Error(result.mensaje)
                        }
                    }
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `${error}`
                    )
                })
        },
        allowOutsideClick: () => !Swal.isLoading()
    })
}