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
            background: url('/images/escarapela.jpg')  no-repeat;
            background-size: contain;
            background-position: center center;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <div class="container">
            <div class="escarapela"></div>
            <div class="escarapela"></div>
            <div class="escarapela"></div>
            <div class="escarapela"></div>
    </div>
    <div class="container">
            <div class="escarapela"></div>
            <div class="escarapela"></div>
            <div class="escarapela"></div>
            <div class="escarapela"></div>
    </div>
    
</body>
</html>