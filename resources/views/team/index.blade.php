@extends('app')

@section('content')
    <h1>Team list</h1>
    <div class="well">
    {!! Form::open(array('class' => 'form-inline')) !!}
        <div class="form-group">
            {!! Form::label('name', 'Add new team:' ) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
    </div>
    <hr>
    {{-- Add tablesorter search for team --}}
    <table class="table table-striped">
        <tbody>
        @foreach ($teams as $team)
        <tr>
            <td class="col-xs-10"><strong>{{ $team->name }}</strong></td>
            <td class="col-xs-1"><a class="btn btn-info" href="{{ action('TeamsController@edit', [$team->id]) }}">Edit</a></td>
            <td class="col-xs-1">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#team-{{$team->id}}">
                Remove
                </button>
            </td>
        </tr>
       @endforeach
        </tbody>
    </table>

    @foreach ($teams as $team)
    <!-- Modal -->
    <div class="modal fade" id="team-{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$team->name}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Do you want to remove {{ $team->name }}?</h4>
                </div>
                <div class="modal-body">
                    <p>By removing this please make sure to reassign the players in this team to another team or remove them.</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(array('route' => ['team.destroy', $team->id], 'method' => 'delete')) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                    <button type="submit" class="btn btn-danger">Remove</button>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
@stop