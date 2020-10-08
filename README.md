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


## Creando POSTS:

    - Crear modelo (m: migration , r: controlador full):
        php artisan make:model Post -mr

    - Factory para crear Post:
        php artisan make:factory PostFactory --model=Post
        Post::factory(10)->create();

    - Notificacion para post (Parametros de notificacion configurables) :
        php artisan make:notification PostPublished

    - En el modelo (Post): 
        protected $guarded = [];

        // Aca definimos que tiene de evento lanzara que tipo de clase Evento
        protected $events = [

            // 'created' => PostCreated::class,
            // 'updated' => Evento::class
        ];
    
    - Crear evento (laravel 8 usa $dispatchesEvents, no $events):
        php artisan make:event PostCreated

    - Crear el listener:
        php artisan make:listener NotifyUsersAboutNewPost

    - Añadir los eventos y listener q hayamos creado en: app/Providers/EventServiceProvider.php
    

    -- OJO  : Crear el evento y listener para el Post (cuando ya añadimos en el punto anterior):
        php artisan event:generate


## Utilizando VueJs para las notificaciones

    npm install --save-dev vue

    npm run dev o npm run watch