<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Escarapelas</title>

    <style>
        * {
            margin: 0 auto;
            padding: 0;
        }

        .tftable {
            font-size: 12px;
            color: #333333;
            width: 100%;
            border-width: 1px;
            border-color: #729ea5;
            border-collapse: collapse;
        }

        .tftable tr {
            width: 50%;
            border: 
        }



        .tftable td.organizador {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapela_blank.png') no-repeat;
        }

        
        .tftable td.algoritmo {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_algoritmos.png') no-repeat;
        }

        .tftable td.basedatos {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_bd.png') no-repeat;
        }

        .tftable td.web {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_web.png') no-repeat;
        }

        .tftable td.movil {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapela_moviles.png') no-repeat;
        }

        .tftable td.redes {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_animacion_3d.png') no-repeat;
        }

        .tftable td.multimedia {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_produccion_multimedia.png') no-repeat;
        }

        .tftable td.videojuegos {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_videjuegos.png') no-repeat;
        }

        .tftable td.a3d {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_animacion_3d.png') no-repeat;
        }

        
        .tftable td.medios {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_produccion_medios.png') no-repeat;
        }

        .tftable td.ideatic {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_ideatic.png') no-repeat;
        }

        
        .tftable td.muestra {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_ideatic.png') no-repeat;
        }


        .tftable td {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_animacion_3d.png') no-repeat;
        }


        .page-break {
            page-break-after: always;
        }

        .text{
            text-align: center;
            color: white;
            font-family: 'Work Sans', sans-serif;
        }

        .text span{
            display: block;
            width: 100%;
            height: 40px;
            text-align: center;
            margin-top: 270px;
            font-size: 28px;
            text-transform: capitalize;
        }

        .text b{
            display: block;
            width: 100%;
            height: 40px;
            text-align: center;
            margin-top: 270px;
            font-size: 28px;
            text-transform: capitalize;
        }


    </style>
</head>

<body>


    
    <?php $contTb = 0 ; $contTd = 0;  /*   t->tb->1      */ ?>
    @foreach($personas as $key => $value)
    <?php $class = ""; 
                if($value->tipo_persona == 2){
                    if($value->categoria_id == 1){
                        $class = "algoritmo";
                    }else if($value->categoria_id == 2){
                        $class = "basedatos";
                    }else if($value->categoria_id == 3){
                        $class = "web";
                    }else if($value->categoria_id == 4){
                        $class = "movil";
                    }else if($value->categoria_id == 5){
                        $class = "redes";
                    }else if($value->categoria_id == 6){
                        $class = "multimedia";
                    }else if($value->categoria_id == 7){
                        $class = "videojuegos";
                    }else if($value->categoria_id == 8){
                        $class = "a3d";
                    }else if($value->categoria_id == 9){
                        $class = "medios";
                    }else if($value->categoria_id == 10){
                        $class = "ideatic";
                    }else if($value->categoria_id == 11){
                        $class = "muestra";
                    }
                }else if($value->tipo_persona == 1){
                    $class = "basedatos";
                }
            ?>

        @if($contTb == 0)
            <table class="tftable" border="1">
            <tbody>
        @endif

        @if($contTd == 0)
        <tr>
        @endif
            
            <td class="<?= $class ?>" height="49%" width="50%" style="overflow: hidden">
                <div class="text">
                    <br><br>
                    <b style="font-style: bold; font-size: 30px; text-transform:capitalize"><?php echo strtoupper($value->nombres) ?></b>
                    <br><br>
                    <span style="font-size: 28px; text-transform:capitalize"><?php echo strtoupper($value->apellidos) ?></span>
                    <br><br>
                    <span style="font-size: 20px">No. Doc {{$value->documento}}</span>
                    <!-- <span style="font-size: 18px"><?php echo __DIR__ ?></span> -->
                    <br><br>
                    <!--<span style="font-size: 18px">{{$value->programa_formacion}}</span>-->
                    <br><br>
                    <br><br>
                    <br><br>
                    <span class="photo">
                        <div style="position: absolute; margin-top: 350px;overflow:hidden; margin-left: 50px; width:250px; height:250px;">
                            <img src="D:\Escritorio\SENA 2019\SENASOFT\senasoft\storage\app\fotos/{{$value->foto}}" width="100%">
                        </div>
                        <br>
                        <img style="margin-left: 350px; margin-top:-50px" width="250"
                        src="data:image/png;base64, {!!base64_encode(QrCode::encoding('UTF-8')->format('png')->size(300)->generate($value->documento))!!}"
                        alt="">
                    </span>
                </div>
            </td>
            
        
        <?php $contTb++; $contTd++ ?>

        @if($contTd == 2)
        </tr>
        <?php $contTd = 0; ?>
        @endif

        @if($contTb == 4 )
            </tbody>
            </table>
            <?php $contTb = 0; ?>
            <div class="page-break"></div>
        @endif  

    @endforeach

    @if($contTd == 1)
        <td></td>
        </tr>
        </tbody>
        </table>
    @endif
</body>

</html>
