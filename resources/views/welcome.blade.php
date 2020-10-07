@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
           
            <div class="card-header">{{ __('Inicio') }}</div>

            {{-- <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('Laravel Notificaciones!') }}
            </div>
            </div> --}}
                
            
            {{-- Consultar directamente a la BD --}}
            @foreach (App\Models\Post::latest()->get() as $post)
                <div class="card">
                    <div class="card-body">
                    <a href="{{ route('posts.show', $post) }}">    {{$post->title}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
