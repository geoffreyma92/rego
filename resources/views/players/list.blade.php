@extends('app')

@section('content')
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Rego start</th>
            <th>Rego end</th>
            <th>Team</th>
        </tr>
        </thead>
        <tbody>
        @foreach($players as $player)
            <tr>
                <td>{{$player->first_name}} {{$player->last_name}}</td>
                <td>{{$player->rego_start}}</td>
                <td>{{$player->rego_end}}</td>
                @foreach($players as $player)
                    @if ($player->team )
                        <td>{{$player->first_name}}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>

    </table>
@stop