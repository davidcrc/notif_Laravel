@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <h2>No leidas</h2>
            <ul class="list-group">
                @foreach ($unreadNotifications as $unreadNotification)
                {{-- {{ var_dump($unreadNotification->data)}} --}}
                    <li class="list-group-item"> 
                        <a href="{{ $unreadNotification->data['link'] }}">
                            {{ $unreadNotification->data['text'] }}
                        </a>    
                        
                        <form method="POST" action="{{ route('notifications.read', $unreadNotification->id) }}" class="pull-right" >
                            {{ method_field('PATCH') }}
        
                            {{ csrf_field() }}
                            <button class="btn btn-danger btn-xs">X</button>
                        </form>
                    </li>

                    
                @endforeach
            </ul>
        </div>
        
        
        <div class="col-md-6">
            <h2>Leidas</h2>
            @foreach ($readNotifications as $readNotification)
                <li class="list-group-item"> 
                    <a href="{{ $readNotification->data['link'] }}">
                        {{ $readNotification->data['text'] }}
                    </a>

                    <form method="POST" action="{{ route('notifications.destroy', $readNotification->id) }}" class="pull-right" >
                        {{ method_field('DELETE') }}
    
                        {{ csrf_field() }}
                        <button class="btn btn-danger btn-xs">X</button>
                    </form>
                </li>
            @endforeach
        </div>
        
        </div>
    </div>
</div>
@endsection
