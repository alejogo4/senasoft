function guardar() {
    var data = new FormData();

    data.append('nombre_jurado', $("#nombre_jurado").val())
    data.append('fecha', $("#fecha").val())
    data.append('categoria_id', $("#categoria_id").val())
    data.append('fase_id', $("#fase_id").val())
    data.append('grupo_id', $("#grupo_id").val())
    data.append('puntaje', $("#puntaje").val())
    data.append('adjunto', $("#adjunto")[0].files[0])

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        url: "/fases",
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (r) {
            if (r.ok) {
                Swal.fire({
                    title: 'Éxito',
                    text: r.message,
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                })
                $("input").val('')
                $('select').val('')
                $('#listTeam').html('')
            } else {
                if (r.error) {
                    Swal.fire({
                        title: 'Error',
                        text: r.error,
                        type: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    })
                }else if(r.mensaje){
                    Swal.fire({
                        title: 'Error',
                        text: r.mensaje,
                        type: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    })
                }else {
                    for (var i in r.messages) {
                        if (r.messages.hasOwnProperty(i)) {
                            console.log(r.messages[i])
                        }
                    }
                }
            }
        }
    });
}
function getTeam(id) {
    $('#listTeam').html('')

    $.get(`/get/team/${id}`, function (r) {
        if (r.data.length>0) {
            r.data.forEach(e => {
                $("#listTeam").append(`<br><li><b>Nombre: </b> ${e.persona.apellidos} ${e.persona.nombres}  <b>Documento: </b> ${e.persona.documento}</li>`)
            });
        } else {
            $('#listTeam').html('<li>Este grupo no tiene personas')            
        }
    });
}




