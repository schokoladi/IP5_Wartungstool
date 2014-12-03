@extends('layouts.main')
@extends('layouts.create')

@section('nav')
{{ link_to("/maintenance/create", "WA erfassen") }}
{{ link_to("maintenancearticles/create", "WV-Artikel hinzufügen") }}
{{ link_to("/services/create", "Service hinzufügen") }}
@stop

@section('form')
    <h1>Neuen Wartungsvertrag erfassen</h1>

    {{ Form::open(['route' => 'maintenance.store']) }}
        <div>
            {{ Form::label('Kunden_ID', 'Kunde') }}
            {{ Form::select('Kunden_ID', $customer_options , Input::old('Kunden_ID')) }}
        </div>
        <div>
            {{ Form::label('Kontaktpersonen_ID', 'Kontaktperson') }}
            {{ Form::select('Kontaktpersonen_ID', $contact_options , Input::old('Kontaktpersonen_ID')) }}
        </div>
        <div>
            {{ Form::label('Titel', 'Titel: ') }}
            {{ Form::text('Titel') }}
            {{ $errors->first('Titel') }}
        </div>
        <div>
            {{ Form::label('Vertragsnummer', 'Vertragsnummer: ') }}
            {{ Form::text('Vertragsnummer') }}
            {{ $errors->first('Vertragsnummer') }}
        </div>
        <div>
            {{ Form::label('Beschreibung', 'Beschreibung: ') }}
            {{ Form::textarea('Beschreibung') }}
        </div>
        {{ Form::submit('Wartungsvertrag speichern') }}
    {{ Form::close() }}
@stop