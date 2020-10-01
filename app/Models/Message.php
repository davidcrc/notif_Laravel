<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    // permite hacer todos los demas campos llenables masivamente , excepto este
    protected $guarded = ['id'];
    
    // protected $fillable = ['sender_id', 'receiver_id', 'body'];
}
