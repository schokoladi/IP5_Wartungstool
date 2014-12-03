@extends('layouts.main')
@extends('layouts.create')

@section('nav')
{{ link_to("/manufacturers/create", "Hersteller hinzufügen") }}
{{ link_to("/articles/create", "Artikel hinzufügen") }}
{{ link_to("/warranties/create", "Garantie hinzufügen") }}
@stop

@section('form')
    <h1>Neuen Hersteller erfassen</h1>

    {{ Form::open(['route' => 'manufacturers.store']) }}
        <div>
            {{ Form::label('Name', 'Herstellername: ') }}
            {{ Form::text('Name') }}
        </div>
        {{ Form::submit('Hersteller speichern') }}
    {{ Form::close() }}
@stop