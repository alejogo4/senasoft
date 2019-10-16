<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .st {
            width: 300px;
            height: 230px;
            background: url(/images/equipos.jpg) no-repeat;
            position: relative;
            float: left;
            background-position: center;
        }

        * {
            margin: 0;
            padding: 0;
        }

        
        .tftable {
            font-size: 14px;
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
        <td class="st" style="overflow: hidden">
            <p><b>{{$value->nombre_categoria}}</b></p>
            <p>{{$value->nombres}} {{$value->apellidos}}</p>
        </td>
        <?php $contTb++; $contTd++ ?>

        @if($contTd == 4)
        </tr>
        <?php $contTd = 0; ?>
        @endif

    @if($contTb == 28 )
            </tbody>
        </table>
        <?php $contTb = 0; ?>
        <div class="page-break"></div>
    @endif

    @endforeach

    @if($contTd < 28)
    </tr>
    </tbody>
    </table>
    @endif


</body>

</html>
