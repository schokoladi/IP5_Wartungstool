@extends('layouts.main')
@extends('layouts.create')

@section('nav')
{{ link_to("/hersteller/create", "Hersteller hinzufügen") }}
{{ link_to("/artikel/create", "Artikel hinzufügen") }}
{{ link_to("garantien/create", "Garantie hinzufügen") }}
@stop

@section('form')
    <h1>Neue Garantie erfassen</h1>

    {{ Form::open(['route' => 'garantien.store']) }}
        <div>
            {{ Form::label('Artikel_ID', 'Artikel') }}
            {{ Form::select('Artikel_ID', $artikel_options , Input::old('Artikel_ID')) }}
        </div>
        <div>
            {{ Form::label('Name', 'Name: ') }}
            {{ Form::text('Name') }}
        </div>
        <div>
            {{ Form::label('Beschreibung', 'Beschreibung: ') }}
            {{ Form::textarea('Beschreibung') }}
        </div>
        <div>
            {{ Form::label('Einkaufspreis', 'Einkaufspreis: ') }}
            {{ Form::text('Einkaufspreis') }} CHF
        </div>
        <div>
            {{ Form::label('Verkaufspreis', 'Verkaufspreis: ') }}
            {{ Form::text('Verkaufspreis') }} CHF
        </div>
        <div>
            {{ Form::label('Dauer', 'Dauer: ') }}
            {{ Form::text('Dauer') }} Monate
        </div>
        {{ Form::submit('Garantie speichern') }}
    {{ Form::close() }}
@stop