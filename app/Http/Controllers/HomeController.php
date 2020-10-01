<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;


class HomeController extends Controller
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
    public function index()
    {
        // $users = User::all();
        $users = User::where('id', '!=' , \auth()->id() )->get();
        return view('home', \compact('users'));
    }

    // 

    public function store(Request $request){

        // Validar aqui
        Message::create([
            'sender_id' => \auth()->id() ,
            'receiver_id' => $request->receiver_id,
            'body' => $request->body,
        ]);

        \Log::debug( $request);
        return \back()->with('flash', 'Tu mensaje se envio!');
    }
}
