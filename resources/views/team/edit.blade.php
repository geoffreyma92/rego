@extends('app')

@section('content')
    <h1>{{$team->name}}</h1>
    <hr>
    <h2>Players</h2>
    @if (count($players))
    <table class="table striped">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Start Rego</th>
            <th>End Rego</th>
            <th>Email</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
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

    @foreach ($players as $player)
            <!-- Modal -->
    <div class="modal fade" id="player-{{$player->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$player->first_name}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Do you want to remove {{ $player->first_name }} {{ $player->last_name }}?</h4>
                </div>
                <div class="modal-body">
                    <p>Please hit Remove if you wish to delete this player.</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(array('route' => ['player.destroy', $player->id], 'method' => 'delete')) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Remove</button>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
        <h3>No players have been created/assigned to this team.</h3>
    @endif

@stop