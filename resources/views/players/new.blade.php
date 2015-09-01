@extends('app')

@section('content')
    <h2>New Registration</h2>
    <div class="well">
        {!! Form::open(array('route' => ['player.store'], 'method' => 'post')) !!}
            @include('players.form', ['submitButtonText' => 'Add player'])
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