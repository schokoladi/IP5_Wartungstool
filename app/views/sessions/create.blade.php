@extends('layouts.main')

@section('content')
    <h1>Login</h1>

    {{ Form::open(['route' => 'sessions.store']) }}
        <div>
            {{ Form::label('Name', 'Benutzername: ') }}
            {{ Form::text('Name') }}
        </div>
        <div>
            {{ Form::label('Passwort', 'Passwort: ') }}
            {{ Form::password('Passwort') }}
        </div>
        <div>{{ Form::submit('Login') }}</div>
    {{ Form::close() }}

@stop