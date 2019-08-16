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

        .container {
            width: 100%;
            height: 100vh;
        }


        .escarapela {
            width: 50%;
            height: 50vh;
            float: left;
            overflow: auto;
            background: url('/images/escarapela_blank.jpg') no-repeat;
            background-size: contain;
            background-position: center center;
            box-sizing: border-box;
            text-align: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: white;
            position: relative;
        }

        .escarapela .text {
            position: absolute;
            left: 0px;
            right: 0px;
            width: 80%;
            top: 90px;
        }

        .escarapela .name {
            margin-top: 15%;
            font-size: 15px;
        }

        .escarapela h3 {
            font-size: 12px;
        }

    </style>
</head>

<body>


    <style type="text/css">
        .tftable {
            font-size: 12px;
            color: #333333;
            width: 100%;
            border-width: 1px;
            border-color: #729ea5;
            border-collapse: collapse;
        }

        .tftable tr {}

        .tftable td {
            font-size: 12px;
            border-width: 1px;
            border-style: solid;
            background: url('/images/escarapela_blank.png') no-repeat;
            background-size: 100%;

        }

        .page-break {
            page-break-after: always;
        }

    </style>

    <?php $cont = 0 ?>
    @foreach($personas as $key => $value)

    @if(($key+1)%4 == 0)
    <table class="tftable" border="0">
    <tbody>
    <?php $cont = 0 ?>
    @endif

    
    <?php $cont++ ?>
    <?php if($cont == 3): ?>
    <tr>
    <?php endif; ?>
    <td height="49%">
        <div class="text">
            <h2 class="name">{{$value->nombres}}</h2>
            <h3 class="lastname">{{$value->apellidos}}</h3>
            <p>No. Doc {{$value->documento}}</p>
            <h3></h3>
        </div>
    </td>
    <?php if($cont == 5): ?>
    </tr>
    <?php endif; ?>


    @if($cont == 4)
    </tbody>
    </table>
    <div class="page-break"></div>
    @endif


    @endforeach
</body>

</html>
