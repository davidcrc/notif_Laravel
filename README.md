# notif_Laravel

## Inicializar auth

    --- Versiones antiguas antes de la 6: php artisan make:auth
    composer require laravel/ui
    php artisan ui bootstrap --auth
    npm install && npm run dev

## Modificando la interfaz, agregar usuarios enviar y guardar mensajes

    - Modificar el app.blade.php para añadir interfaz a lado del usuario en sesion
    - Modificar el home.blade.php para la interfaz de mensajes

    - Añadir usuario ficticios:
        php artisan tinker
        User::factory(11)->create();

    - Mejora: Creamos un modelo messages (añadimos mas campos a la migracion)
        php artisan make:model Message -m
        php artisan migrate

    - Tabla para almacenar las notificaciones:

        php artisan notifications:table
        php artisan migrate

    - Crear una notificacion:
        php artisan make:notification MessageSent

    - Crear un controlador para las notificaciones
        php artisan make:controller NotificationsController

    - Creadas vistas para notificaciones: resources/views/notifications/index.blade.php

    - Para envio por correo:
        - modificar en (function via ) : app/Notifications/MessageSent.php : return ['mail'];
        - modificar en (function toMail ) : app/Notifications/MessageSent.php : las variables necesarias ...
        - En el .env: 
            MAIL_FROM_ADDRESS=correo@gmail.com
            MAIL_FROM_NAME=...
            MAIL_MAILER=smtp
            MAIL_HOST=smtp.mailtrap.io
            MAIL_USERNAME=abc
            MAIL_PASSWORD=123

        - Para modificar los assets de mail, debemos publicarlos
            php artisan vendor:publish --tag=laravel-notifications