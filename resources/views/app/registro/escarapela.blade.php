<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escarapelas</title>

    <style>
        *{
            margin: 0 auto;
            padding:0;
        }

        .container{
            width: 100%;
            height: 100vh;
        }

       
        .escarapela{
            width: 50%;
            height: 50vh;
            float:left;
            overflow: auto;
            background: url('/images/escarapela_blank.jpg')  no-repeat;
            background-size: contain;
            background-position: center center;
            box-sizing: border-box;
            text-align: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: white;
            position: relative;
        }

        .escarapela .text{
            position: absolute;
            left: 0px;
            right: 0px;
            width: 80%;
            top: 90px;
        }

        .escarapela .name{
            margin-top: 15%;
            font-size: 15px;
        }

        .escarapela h3{
            font-size: 12px;
        }
    </style>
</head>
<body>
    <?php $cont=0 ?>
    @foreach($personas as $key => $value)
        @if(($key+1)%4 == 0 || $key+1 == 1)
            <div class="container">
            <?php $cont=0 ?>
        @endif
        <?php $cont++ ?>
        <div class="escarapela">
            <div class="text">
                <h2 class="name">{{$value->nombres}}</h2>
                <h3 class="lastname">{{$value->apellidos}}</h3>
                <p>No. Doc {{$value->documento}}</p>
                <h3></h3>
            </div>
        </div>
 
        @if($cont == 4)
            </div>
        @endif
    @endforeach
    
    
</body>
</html>