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

        .text{
            text-align: center;
            color: white;
            line-height: 90px;
            height: 80px;
            overflow: auto;
            
        }

        .name{
            margin-top: 180px;
        }

        .lastname{
            margin-top: 220px;
        }

    </style>
</head>

<body>


    
    <?php $contTb = 0 ; $contTd = 0;  /*   t->tb->1      */ ?>
    @foreach($personas as $key => $value)

        @if($contTb == 0)
            <table class="tftable" border="0">
            <tbody>
        @endif

        @if($contTd == 0)
        <tr>
        @endif
        
            <td height="49%">
                <div class="text name">
                    <h2 class="name">{{$value->nombres}}</h2>
                </div>
                <div class="text lastname">
                     <h3>{{$value->apellidos}}</h3>
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
</body>

</html>
