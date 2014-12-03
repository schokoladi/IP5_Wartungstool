@extends('layouts.main')
@extends('layouts.create')

@section('nav')
{{ link_to("/maintenance/create", "WA erfassen") }}
{{ link_to("/maintenancearticles/create", "WV-Artikel hinzufügen") }}
{{ link_to("/services/create", "Service hinzufügen") }}
@stop

@section('form')
    <h1>Neuen Wartungsvertragsartikel erfassen</h1>

    {{ Form::open(['route' => 'maintenancearticles.store']) }}
        <div>
            {{ Form::label('Wartungsvertraege_ID', 'Wartungsvertrag') }}
            {{ Form::select('Wartungsvertraege_ID', $maintenance_options , Input::old('Wartungsvertraege_ID')) }}
        </div>
        <div>
            {{ Form::label('Artikelhersteller_ID', 'Hersteller') }}
            {{ Form::select('Artikelhersteller_ID', $manufacturer_options , Input::old('Artikelhersteller_ID')) }}
        </div>
        <div>
            {{ Form::label('Artikel_ID', 'Artikel') }}
            {{ Form::select('Artikel_ID', $article_options , Input::old('Artikel_ID')) }}
        </div>
        <div>
            {{ Form::label('Titel', 'Titel: ') }}
            {{ Form::text('Titel') }}
            {{ $errors->first('Titel') }}
        </div>
        <div>
            {{ Form::label('Seriennummer', 'Seriennummer: ') }}
            {{ Form::text('Seriennummer') }}
            {{ $errors->first('Seriennummer') }}
        </div>
        <div>
            {{ Form::label('Beschreibung', 'Beschreibung: ') }}
            {{ Form::textarea('Beschreibung') }}
        </div>
        {{ Form::submit('Wartungsvertragsartikel speichern') }}
    {{ Form::close() }}
@stop