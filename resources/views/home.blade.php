<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inveta</title>
    <link rel="shortcut icon" href="media/favicon.ico" >
</head>
<body>
    @if (session('mensaje'))
        <p style="font-size:20px; font-weight:bold; padding-top:30px; color:red">{{session('mensaje')}}</p>
    @endif
    <h1>Aplicación Principal</h1>
</body>
</html>