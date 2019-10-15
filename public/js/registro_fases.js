function guardar() {
    var data = new FormData();

    data.append('nombre_jurado',$("#nombre_jurado"))
    data.append('fecha',$("#fecha"))
    data.append('categoria_id',$("#categoria_id"))
    data.append('fase_id',$("#fase_id"))
    data.append('grupo_id',$("#grupo_id"))
    data.append('puntaje',$("#puntaje"))
    data.append('adjunto',$("#adjunto")[0].files[0])
}

        
                

                    
                