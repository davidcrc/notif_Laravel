<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Notifications\MessageSent;


class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        // $users = User::all();
        $users = User::where('id', '!=' , \auth()->id() )->get();
        return view('home', \compact('users'));
    }

    // 

    public function store(Request $request){

        // Validar aqui
        $this->validate ($request , [
            'body' => 'required',
            'receiver_id' => 'required|exists:users,id',     // que exista el reciver en la tabla user con campo id

        ]);
        $message = Message::create([
            'sender_id' => \auth()->id() ,
            'receiver_id' => $request->receiver_id,
            'body' => $request->body,
        ]);

        $receiver = User::find($request->receiver_id);

        \Log::debug( $message);

        $notify = new MessageSent($message);
        $receiver->notify($notify);

        \Log::debug( $request);
        return \back()->with('flash', 'Tu mensaje se envio!');
    }

    // Mostrara los mensajes
    public function show($id) {

        $message = Message::findOrFail($id);

        return view('messages.show', compact('message') );

    }
    
}
