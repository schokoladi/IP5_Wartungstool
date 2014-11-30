@extends('layouts.default')

@section('content')
    <h1>Create new User</h1>

    {{ Form::open() }}
        <div>
            {{ Form::label('Name', 'Name des Users: ') }}
            {{ Form::text('name') }}
        </div>

        <div>
            {{ Form::label('Passwort', 'Passwort: ') }}
            {{ Form::password('Passwort') }}
        </div>
        {{ Form::submit('Mach mau User') }}
    {{ Form::close() }}

@stop