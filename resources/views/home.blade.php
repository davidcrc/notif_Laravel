@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Enviar mensaje') }}</div>

            <form method="POST" action="{{route('messages.store')}}">
                {{ csrf_field() }}
                    <div class="card-body">
                        
                        <div class="form-group">                        
                            <select name="receiver_id" id="" class="form-control">
                                <option value="">Seleccione</option>
                                @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">                        
                            <textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="Aqui tu mensaje!"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Enviar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
