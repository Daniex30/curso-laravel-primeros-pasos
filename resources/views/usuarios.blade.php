<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>
<body>
    {{ $user->id }}
    {{ $user->name }}
    {{ $user->email }}

    {{ $user->password }}

    {{ $user->created_at }}

</body>
</html>