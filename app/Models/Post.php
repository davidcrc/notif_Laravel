<?php

namespace App\Models;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Aca definimos que tiene de evento lanzara que tipo de clase Evento
    // Versiones anteriores usan $events , en laravel 8 se usa $dispatchesEvents
    
    // protected $events = [
    protected $dispatchesEvents = [

        'created' => PostCreated::class
    ];
}
