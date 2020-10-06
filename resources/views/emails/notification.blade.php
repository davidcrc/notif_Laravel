<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Hola esta es una prueba de mensaje para email

    <h1>
        {{ $user->name }}
    </h1>
    <p>haz recibido un mensaje!!!.</p>

    <a href="{{ route('messages.show', $msg->id ) }}">Click aqui para verlo</a>

    <p>Gracias por preferirnos</p>
</body>
</html>