@extends('layouts.default')

@section('content')
    <h1>Create new User</h1>

    {{ Form::open(['route' => 'users.store']) }}
        <div>
            {{ Form::label('Name', 'Name des Users: ') }}
            {{ Form::text('name') }}
            {{ $errors->first('name') }}
        </div>

        <div>
            {{ Form::label('Email', 'E-Mail: ') }}
            {{ Form::text('e-mail') }}
        </div>

        <div>
            {{ Form::label('Passwort', 'Passwort: ') }}
            {{ Form::password('password') }}
            {{ $errors->first('password') }}
        </div>
        {{ Form::submit('Mach mau User') }}
    {{ Form::close() }}

@stop