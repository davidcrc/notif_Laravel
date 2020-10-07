@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
           
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam, dolor officiis nisi necessitatibus soluta voluptates. Sed nostrum dolorem reiciendis quae, neque, repellat, deleniti ratione unde distinctio harum maxime blanditiis ab?</p>

            <br>
            <h1> {{ $post->title }} </h1>
            <p> {{ $post->body }} </p>
        </div>
    </div>
</div>
@endsection
