<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    use HasFactory;
    // permite hacer todos los demas campos llenables masivamente , excepto este
    protected $guarded = ['id'];

    // protected $fillable = ['sender_id', 'receiver_id', 'body'];

    // Devuelve la relacion entre usuario y sender_id , en la vista messages.show
    public function sender(){
     
        // 
        return $this->belongsTo(User::class , 'sender_id');
    }
}
