@extends('layouts.main')
@extends('layouts.create')

@section('nav')
{{ link_to("/hersteller/create", "Hersteller hinzufügen") }}
{{ link_to("/artikel/create", "Artikel hinzufügen") }}
{{ link_to("/garantie/create", "Garantie hinzufügen") }}
@stop

@section('form')
    <h1>Neuen Hersteller erfassen</h1>

    {{ Form::open(['route' => 'hersteller.store']) }}
        <div>
            {{ Form::label('Name', 'Herstellername: ') }}
            {{ Form::text('Name') }}
        </div>
        {{ Form::submit('Hersteller speichern') }}
    {{ Form::close() }}
@stop