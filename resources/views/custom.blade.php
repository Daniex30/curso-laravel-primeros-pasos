<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>custom</title>
</head>
<body>
    <h2><?php echo $msj?></h2><!--Aca estamos mostrando el mensaje definido en la route--><!--forma php tradicional-->
    <h2><?= $msj?></h2><!--es lo mismo de arriba solo que para versiones de php mas adelantadas-->
    <h2>{{ $msj}}</h2><!--es lo mismo que arriba pero escrito con la sintaxis de blade-->
    <h2>Hola me llamo :{{$nombre}}</h2>
    <h2>Mi apellido es: {{$apellido}}</h2>
    <h2>Yo soy {{$profesion}} de profesion</h2>
    <h2>y mi edad es {{$edad}}</h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere tempora veniam fugit quae. Et dolores culpa consectetur rerum magni, minus, qui in assumenda harum incidunt, eius natus aliquid dolorem quisquam!</p>
</body>
</html>