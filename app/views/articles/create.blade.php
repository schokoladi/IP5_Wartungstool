@extends('layouts.main')
@extends('layouts.create')

@section('nav')
<button type="button" class="btn-menue">{{ link_to("/manufacturers/create", "Hersteller hinzufügen") }}</button>
<button type="button" class="btn-menue-act">{{ link_to("/articles/create", "Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/warranties/create", "Garantie hinzufügen") }}</button>
@stop

@section('form')
    <h1>Neuen Artikel erfassen</h1>

    {{ Form::open(['route' => 'articles.store']) }}
        <div>
            <span>{{ Form::label('Artikelhersteller_ID', 'Hersteller') }}</span>
            {{ Form::select('Artikelhersteller_ID', $manufacturer_options , Input::old('Artikelhersteller_ID')) }}
        </div>
        <div>
            {{ Form::label('Artikelnummer', 'Artikelnummer: ') }}
            {{ Form::text('Artikelnummer') }}
            {{ $errors->first('Artikelnummer') }}
        </div>
        <div>
            {{ HTML::decode(Form::label('Name', 'Artikelname: ')) }}
            {{ Form::text('Name') }}
            {{ $errors->first('Name') }}
        </div>
        <div>
            {{ Form::label('Beschreibung', 'Beschreibung: ') }}
            {{ Form::textarea('Beschreibung') }}
        </div>
        <div>
            {{ Form::label('Einkaufspreis', 'Einkaufspreis: ') }}
            {{ Form::text('Einkaufspreis') }} CHF
            {{ $errors->first('Einkaufspreis') }}
        </div>
        <div>
            {{ Form::label('Verkaufspreis', 'Verkaufspreis: ') }}
            {{ Form::text('Verkaufspreis') }} CHF
            {{ $errors->first('Verkaufspreis') }}
        </div>
        {{ Form::submit('Artikel speichern') }}
    {{ Form::close() }}
@stop