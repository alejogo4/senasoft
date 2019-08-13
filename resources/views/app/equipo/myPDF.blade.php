<!DOCTYPE html>
<html>

<head>
    <title>Equipos</title>
    <style>
        .page-break {
            page-break-after: always;
        }
        @page {
            margin-top: 0;
            margin-left: 0;
        }
    </style>
</head>

<body style="padding: 0; margin: 0">
    @foreach($equipos as $value)
    <div style="width: 100%;
        height: 380px;
        padding: 0;
        margin: 0;
        background: url(https://senasoft.fabricadesoftware.co/images/equipos.png);
        background-repeat: no-repeat;
        background-size: 500px 380px;">
        <img style="float: right; position: absolute; bottom: 150px" width="200"
            src="data:image/png;base64, {!!base64_encode(QrCode::encoding('UTF-8')->format('png')->merge('/../senasoft.fabricadesoftware.co/admin/img/brand_small.png', .3)->size(200)->generate($value->id))!!}"
            alt="">
    </div>
    <div class="page-break"></div>
    @endforeach
</body>

</html>
