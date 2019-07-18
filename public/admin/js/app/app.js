let notificaciones = () => {
    $.get("/notificaciones", (data) => {
        $("#lista_notificaciones").empty();
        if (data.length == 0) {
            $("#notificaciones").html(`<i class="la la-bell"></i>`);
            $("#n_registros").text(0);
        } else {
            $("#notificaciones").html(`<i class="la la-bell animated infinite swing"></i>
            <span class="badge-pulse"></span>`);
            $("#n_registros").text(data.length);
            data.forEach(e => {
                $("#lista_notificaciones").append(`<li>
                    <a href="#">
                        <div class="message-icon">
                            <i class="la la-user"></i>
                        </div>
                        <div class="message-body">
                            <div class="message-body-heading">
                                ${e.centro.regional.nombre_regional}
                                <br>
                                ${e.centro.nombre_centro}
                            </div>
                            <span class="date">${e.nombres+" "+e.apellidos}</span>
                        </div>
                    </a>
                </li>`);
            })
        }
    })
}


$(function(){
    notificaciones();
    setInterval(()=>{
        notificaciones();
    }, 10000)
})