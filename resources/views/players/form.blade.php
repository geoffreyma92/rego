<div class="form-group @if ($errors->has('first_name')) has-error has-feedback @endif">
    {!! Form::label('first_name', 'First name: ', ['class' => 'control-label'] ) !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group @if ($errors->has('last_name')) has-error has-feedback @endif">
    {!! Form::label('last_name', 'Last name: ', ['class' => 'control-label'] ) !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group @if ($errors->has('rego_start')) has-error has-feedback @endif">
    {!! Form::label('rego_start', 'Rego start: ', ['class' => 'control-label'] ) !!}
    {!! Form::input('text', 'rego_start', null, ['class' => 'form-control datepicker']) !!}
</div>

<div class="form-group @if ($errors->has('rego_end')) has-error has-feedback @endif">
    {!! Form::label('rego_end', 'Rego end:', ['class' => 'control-label'] ) !!}
    {!! Form::input('text', 'rego_end', null, ['class' => 'form-control datepicker']) !!}
</div>

<div class="form-group @if ($errors->has('email')) has-error has-feedback @endif">
    {!! Form::label('email', 'Email: ', ['class' => 'control-label'] ) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group @if ($errors->has('team')) has-error has-feedback @endif">
    {!! Form::label('team', 'Team:', ['class' => 'control-label'] ) !!}
    {!! Form::select('team', array('' => 'Please select a team') + $teams, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>