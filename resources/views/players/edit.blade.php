@extends('app')

@section('content')
    <h2>Edit player details</h2>
    <div class="well">
        {!! Form::model($player, ['method' => 'PATCH', 'action' => ['PlayersController@update', $player->id]]) !!}
        @include('players.form', ['submitButtonText' => 'Update'])
        {!! Form::close() !!}
    </div>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
@stop