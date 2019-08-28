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
            margin-top: 240px;
            font-size: 25px;
            
        }


    </style>
</head>

<body>


    
    <?php $contTb = 0 ; $contTd = 0;  /*   t->tb->1      */ ?>
    @foreach($personas as $key => $value)

        @if($contTb == 0)
            <table class="tftable" border="1">
            <tbody>
        @endif

        @if($contTd == 0)
        <tr>
        @endif
        
            <td height="49%" width="50%" style="overflow: hidden">
                <div class="text">
                    <br><br>
                    <span style="font-size: 22px">{{$value->nombres}}</span>
                    <br><br>
                    <span style="font-size: 18px">{{$value->apellidos}}</span>
                    <br><br>
                    <span style="font-size: 16px">No. Doc {{$value->documento}}</span>
                    <br><br>
                    <span style="font-size: 16px">{{$value->programa_formacion}}</span>
                    <br><br>
                    <br><br>
                    <br><br>
                    <span class="photo">
                        <img style="margin-top: 40px; margin-left: 50px;" src="images/<?php echo $value->documento; ?>_foto.jpg" width="200px">
                        <br>
                        <img style="margin-left: 370px; margin-top: 125px;" width="200"
                        src="data:image/png;base64, {!!base64_encode(QrCode::encoding('UTF-8')->format('png')->size(200)->generate($value->documento))!!}"
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
