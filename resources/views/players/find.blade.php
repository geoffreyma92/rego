@extends('app')

@section('content')
    <h2>Find a player</h2>

    {!! Form::open(array('method' => 'post', 'class' => 'form-inline')) !!}
        <div class="form-group">
            {!! Form::label('date_start', 'From:' ) !!}
            {!! Form::input('date', 'date_start', null, ['class' => 'form-control datepicker']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('date_end', 'to:' ) !!}
            {!! Form::input('date', 'date_end', null, ['class' => 'form-control datepicker']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    <hr>

    <table class="table table-bordered table-hover table-striped table-sorter">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Start Rego</th>
            <th>End Rego</th>
            <th>Email</th>
            <th class="sorter-false">&nbsp;</th>
            <th class="sorter-false">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)
            <tr>
                <td>{{$player->first_name}}</td>
                <td>{{$player->last_name}}</td>
                <td>{{$player->rego_start->format('d/m/Y')}}</td>
                <td>{{$player->rego_end->format('d/m/Y')}}</td>
                <td>@if (count($player->email)) <a href="mailto:{{$player->email}}" target="_top">{{$player->email}}</a>@endif</td>
                <td class="col-xs-1"><a class="btn btn-info" href="{{ action('PlayersController@edit', [$player->id]) }}">Edit</a></td>
                <td class="col-xs-1">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#player-{{$player->id}}">
                        Remove
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop