@extends('layouts.default')

@section('content')
    <h1>Login</h1>

    {{ Form::open(['route' => 'sessions.store']) }}
        <div>
            {{ Form::label('Name', 'Benutzername: ') }}
            {{ Form::text('name') }}
        </div>
        <div>
            {{ Form::label('Passwort', 'Passwort: ') }}
            {{ Form::password('password') }}
        </div>
        <div>{{ Form::submit('Login') }}</div>
    {{ Form::close() }}

@stop