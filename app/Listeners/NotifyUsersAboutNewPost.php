<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

use App\Models\User;
use App\Events\PostCreated;
use App\Notifications\PostPublished;
// use Notification;

// OJO: Podemos enviar el envio a una cola de trabajo

class NotifyUsersAboutNewPost implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle( PostCreated $event)
    {
        // Pruebas
        // var_dump($event->post->toArray());

        // Notificando a usuarios
        $users = User::all();               // Aca podemos filtrar a los usuarios que se necesite

        $new_post = new PostPublished($event->post);

        Notification::send($users, $new_post);

    }
}
