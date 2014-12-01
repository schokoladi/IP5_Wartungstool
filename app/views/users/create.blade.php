@extends('layouts.default')

@section('content')
    <h1>Create new User</h1>

    {{ Form::open(['route' => 'users.store']) }}
        <div>
            {{ Form::label('Name', 'Name des Users: ') }}
            {{ Form::text('Name') }}
            {{ $errors->first('Name') }}
        </div>
        <div>
            {{ Form::label('Passwort', 'Passwort: ') }}
            {{ Form::password('Passwort') }}
            {{ $errors->first('Passwort') }}
        </div>
        {{ Form::submit('User erstellen') }}
    {{ Form::close() }}

@stop