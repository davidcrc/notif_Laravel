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