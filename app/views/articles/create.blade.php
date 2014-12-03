@extends('layouts.main')
@extends('layouts.create')

@section('nav')
{{ link_to("/manufacturers/create", "Hersteller hinzufügen") }}
{{ link_to("/articles/create", "Artikel hinzufügen") }}
{{ link_to("/warranties/create", "Garantie hinzufügen") }}
@stop

@section('form')
    <h1>Neuen Artikel erfassen</h1>

    {{ Form::open(['route' => 'articles.store']) }}
        <div>
            {{ Form::label('Artikelhersteller_ID', 'Hersteller') }}
            {{ Form::select('Artikelhersteller_ID', $manufacturer_options , Input::old('Artikelhersteller_ID')) }}
        </div>
        <div>
            {{ Form::label('Artikelnummer', 'Artikelnummer: ') }}
            {{ Form::text('Artikelnummer') }}
        </div>
        <div>
            {{ Form::label('Name', 'Artikelname: ') }}
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
        {{ Form::submit('Artikel speichern') }}
    {{ Form::close() }}
@stop