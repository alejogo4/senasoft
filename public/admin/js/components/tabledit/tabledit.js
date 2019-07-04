(function($) {

    'use strict';

    // ------------------------------------------------------- //
    // Example 03
    // ------------------------------------------------------ //	

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })


    $('#tabla_proyectos').Tabledit({
        url: '/proyecto/actualizarTabla',
        deleteButton: false,
        columns: {
            identifier: [0, 'id'],
            editable: [

                [3, 'puntaje'],
                [4, 'estado', '{"0": "Aprobado", "1": "No Aprobado"}']
            ]
        },
        buttons: {
            edit: {
                class: 'btn btn-sm btn-primary td-actions',
                html: '<a href="#"><i class="la la-edit p-1 mr-0 text-white"></i></a>',
                action: 'edit'
            },
            delete: {
                class: 'btn btn-sm btn-danger td-actions',
                html: '<a href="#"><i class="la la-close p-1 mr-0 text-white"></i></a>',
                action: 'delete'
            },
            save: {
                class: 'btn btn-success',
                html: 'Save'
            },
            restore: {
                class: 'btn btn-sm btn-warning',
                html: 'Restore',
                action: 'Restore'
            },
            confirm: {
                class: 'btn btn-primary',
                html: 'Confirm'
            }
        },
        onDraw: function() {
            console.log('onDraw()');
        },
        onSuccess: function(data, textStatus, jqXHR) {

            Swal.fire({
                title: 'Muy Bien',
                text: "Puntaje actualizado con éxito",
                type: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            })

        },
        onFail: function(jqXHR, textStatus, errorThrown) {
            Swal.hideLoading();
            Swal.fire({
                title: 'Espera',
                text: "Ocurrió un error inesperado, intenta más tarde. En caso de persistir el error contacta al administrador del sitio",
                type: 'error',
            })
        },
        onAlways: function() {

        },
        onAjax: function(action, serialize) {

        }
    });

    // ------------------------------------------------------- //
    // Example 02
    // ------------------------------------------------------ //	


})(jQuery);