<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entradas Zoologico</title>
</head>
<body>
    <h2>Hola, {{Auth::user()->name}}</h2>

    <p>Para poder acceder al Zoologico presente este correo el día {{$content['fecha_visita']}}, 15 minutos antes de su visita a las {{$content['hora']}}.</p>
    
    <p>Número total de entradas: {{$content['n_entradas']}}</p>
    <p>Precio total: {{$content['total']}}</p>

    <p>Esperemos que disfrute de la visita, un saludo y gracias. Le esperamos.</p>
</body>
</html>