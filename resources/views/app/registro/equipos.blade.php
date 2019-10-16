<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .st {
            width: 400px;
            height: 307px;
            background: url(/images/equipos.jpg) no-repeat;
            position: relative;
            float: left;
            background-position: center;
        }

        * {
            margin: 0;
            padding: 0;
            font-family: 'Work Sans', sans-serif;
        }

        
        .tftable {
            font-size: 20px;
            color: #333333;
            width: 100%;
            border-width: 1px;
            border-color: #729ea5;
            border-collapse: collapse;
        }

        .tftable p {
            text-align: center;
        }

        .tftable b {
            text-align: center;
        }

    </style>
</head>

<body>
    <?php $contTb = 0 ; $contTd = 0;  ?>
    @foreach($personas as $key => $value)

    @if($contTb == 0)
    <table class="tftable">
    <tbody>
    @endif
        @if($contTd == 0)
        <tr>
        @endif
        <td class="st" style="overflow: hidden;">
            <br>
            <br>
            <p><b>{{$value->nombre_categoria}}</b></p>
            <p>{{$value->nombres}} {{$value->apellidos}}</p>
            <br>
            <p><b>{{$value->nombre_regional}}</b></p>
            <p style="padding-left: 4%; padding-right: 4%: font-size: 14px !important">{{$value->nombre_centro}}</p>
        </td>
        <?php $contTb++; $contTd++ ?>

        @if($contTd == 3)
        </tr>
        <?php $contTd = 0; ?>
        @endif

    @if($contTb == 18 )
            </tbody>
        </table>
        <?php $contTb = 0; ?>
        <div class="page-break"></div>
    @endif

    @endforeach

    @if($contTd < 19)
    <!-- <td class="st" style="overflow: hidden;">
    </td> -->
    </tr>
    </tbody>
    </table>
    @endif


</body>

</html>
