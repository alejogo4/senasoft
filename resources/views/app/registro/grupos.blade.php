@extends("layouts.app")

@section("titulo")
Sorteo de grupos
@endsection

@section('content')
<style>
ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
</style>
<div class="row">
    <div class="col-xl-12">
        <!-- Example 01 -->
        <div class="widget has-shadow" id="instructores">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Generar grupos</h4>
            </div>
            <div id="contenido" class="widget-body text-center">
                <button style="display: none" id="btnGenerar" class="btn btn-success btn-lg">Generar Grupos</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section("script")
    <script>
        function generarGrupos(){
            $("#btnGenerar").attr("disabled", true);
            $("#btnGenerar").html("Generando...");

            $.ajax({
                url: '/registros/generar/grupos',
                dataType: 'json'
            }).done(respuesta=>{
                if(respuesta != null){
                    if(respuesta.ok){
                        alert("Grupos generados");
                        consultarGrupos();
                    }
                }
            })
        }

        function consultarGrupos(){
            $.ajax({
                url: '/registros/listar/grupos',
                dataType: 'json'
            }).done(respuesta=>{
                if(respuesta["Algoritmia"][0].length == 0){
                    $("#btnGenerar").show();
                }else{
                    $("#btnGenerar").hide();
                    let key = Object.keys(respuesta);

                    key.map((ee, i)=>{
                        let contenido = `<ul class="timeline"><h1 style="cursor:pointer" onclick="toogle('${ee.replace(" ", "-").replace(" ", "-").replace(" ", "-")}')">${ee} <i id="icon${ee.replace(" ", "-").replace(" ", "-").replace(" ", "-")}" class="la la-plus" aria-hidden="true"></i></h1><div style="display:none" id="${ee.replace(" ", "-").replace(" ", "-").replace(" ", "-")}">`;
                        let anterior = "";
                        let cont = 0;
                        respuesta[ee][0].map(e => {

                            if(e.nombre != anterior){
                                contenido += `<li><a href="#" >${e.nombre}</a><div class="row">`;
                                cont = 0;
                            }

                            contenido += `
                                <div class="col-${respuesta[ee][1] == 1 ? "12" : (respuesta[ee][1] == 2)? "6" : "4"}">
                                <span>${e.nombres} ${e.apellidos}</span><br>
                                <b>${e.nombre_regional}</b><br>
                                <b>${e.nombre_centro}</b><br>
                                <span>${e.programa_formacion}</span>
                                </div>
                                `;
                            
                            cont ++;
                            anterior = e.nombre;
                            if(cont ==  respuesta[ee][1]){
                                contenido += "</div></li><hr>";
                            }
                        })
                        contenido += `</div></ul>`;

                        $("#contenido").append(contenido);
                    });
                    
                }
            })
        }

        function toogle(e){
            $(`#${e}`).fadeToggle( "fast", "linear" );
    
            if($(`#icon${e}`).hasClass("la la-plus")){
                $(`#icon${e}`).removeAttr("class");
                $(`#icon${e}`).attr("class", "la la-minus")
            }else{
                $(`#icon${e}`).removeAttr("class");
                $(`#icon${e}`).attr("class", "la la-plus")
            }
        }
        $(function(){
            consultarGrupos();

            $("#btnGenerar").click(()=>{
                generarGrupos();
            });
        });
    </script>
@endsection
