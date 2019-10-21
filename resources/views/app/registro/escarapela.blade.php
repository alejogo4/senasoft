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



        .tftable td.instructor {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapelas_instructor.png') no-repeat;
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
            background: url('/images/escarapelas/escarapelas_redes.png') no-repeat;
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
            background: url('/images/escarapelas/escarapelas_muestraProyectos.png') no-repeat;
        }


        .tftable td {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/escarapela_blank.png') no-repeat;
        }

        .tftable td.subdirector {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background-size: 100%;
            background: url('/images/escarapelas/subdirector.jpg') no-repeat;
        }


        .page-break {
            page-break-after: always;
        }

        .text {
            text-align: center;
            color: white;
            font-family: 'Work Sans', sans-serif;
        }


        .text p {
            display: block;
            width: 100%;
            height: 40px;
            text-align: center;

            font-size: 28px;
            text-transform: capitalize;
        }

        .text b {
            display: block;
            width: 100%;
            height: 40px;
            text-align: center;

            font-size: 28px;
            text-transform: capitalize;
        }
    </style>
</head>

<body>



    <?php $contTb = 0;
    $contTd = 0;  /*   t->tb->1      */ ?>
    @foreach($personas as $key => $value)
    <?php $class = "";
    if ($value->tipo_persona == 2) {
        if ($value->categoria_id == 1) {
            $class = "algoritmo";
        } else if ($value->categoria_id == 2) {
            $class = "basedatos";
        } else if ($value->categoria_id == 3) {
            $class = "web";
        } else if ($value->categoria_id == 4) {
            $class = "movil";
        } else if ($value->categoria_id == 5) {
            $class = "redes";
        } else if ($value->categoria_id == 6) {
            $class = "multimedia";
        } else if ($value->categoria_id == 7) {
            $class = "videojuegos";
        } else if ($value->categoria_id == 8) {
            $class = "a3d";
        } else if ($value->categoria_id == 9) {
            $class = "medios";
        } else if ($value->categoria_id == 10) {
            $class = "ideatic";
        } else if ($value->categoria_id == 11) {
            $class = "muestra";
        }
    } else if ($value->tipo_persona == 1) {

        if ($value->categoria_id == 22) {
            $class = "";
        }else if ($value->categoria_id == 23) {
            $class = "";
        }else if ($value->categoria_id == 24) {
            $class = "";
        }else if ($value->categoria_id == 25) {
            $class = "subdirector";
        }else{
            $class = "instructor";
        }
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
                        @if($value->categoria_id != 24)
                        <p style="font-size: 18px; margin-top:170px"><?php echo $value->nombre_centro ?></p>
                        <br>
                        <p style="font-size: 16px; margin-top:10px"><?php echo $value->nombre_regional ?></p>
                        <br>
                        @else
                        <p style="font-size: 20px; margin-top:170px"><?php echo $value->empresa ?></p>
                        <br>
                        <p style="font-size: 18px; margin-top:170px"><?php echo $value->cargo ?></p>
                        <br>
                        @endif
                        <b style="font-style: bold; font-size: 30px; margin-top:100px"><?php echo $value->nombres ?></b>
                        <br>
                        <p style="font-size: 28px; margin-top:114px"><?php echo $value->apellidos ?></p>
                        <br>
                        <p style="font-size: 20px; margin-top:129px">No. Doc {{$value->documento}}</p>
                        <!-- <span style="font-size: 18px"></span> -->
                        <span class="photo">
                            <div style="position: absolute; margin-top: 376px;overflow:hidden; margin-left: 50px; width:250px; height:250px;">
                                <img src="C:\Inetpub\vhosts\gidpi.com\appsenasoft\storage\app\fotos/{{$value->foto}}" width="100%">
                                <!-- <img src="D:\Escritorio\SENA 2019\SENASOFT\senasoft\storage\app\fotos/{{$value->foto}}" width="100%"> -->
                            </div>
                            <br>
                            <img style="margin-left: 350px; margin-top: 290px" width="250" src="data:image/png;base64, {!!base64_encode(QrCode::encoding('UTF-8')->format('png')->size(300)->generate($value->documento))!!}" alt="">
                        </span>
                    </div>
                </td>


                <?php $contTb++;
                $contTd++ ?>

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