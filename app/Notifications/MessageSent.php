<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

// Esta clase almacenara la notificacion dependiendo si es email o database o sms
// Como escogimos database , se usara la funcion toArray() para decirle que daatos almacenara
class MessageSent extends Notification
{
    protected $message;
    use Queueable;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        //
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail'];
        // return ['database'];
        return ['mail', 'database'];


    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Podemos retornar esto si necesitaos algo sencillisimo
        // return (new MailMessage)
        //             ->greeting($notifiable->name . ', ')
        //             // ->error()
        //             ->subject('Mensaje recibido desde App laravel notif')
        //             ->line('Haz recibido un mensaje!')
        //             ->action('Click aqui para ver el mensaje', route('messages.show', $this->message->id ))
        //             ->line('Thank you for using our application!');

        // o retornar esto si deseamos algo mas elaborado
        return (new MailMessage)->view('emails.notification', [
            'msg' => $this->message,
            'user' => $notifiable
        ])->subject('Mensaje recibido desde App laravel notif');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // return [
        //     //
        // ];
        // \Log::debug( $this->message);

        // return $this->message->toArray();

        return [
            'link' => route('messages.show', $this->message->id ),
            'text' => "Haz recibiu un mensaje de ". $this->message->sender->name,
        ];
    }
}
