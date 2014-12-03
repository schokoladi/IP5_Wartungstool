@extends('layouts.main')
@extends('layouts.create')

@section('nav')
<button type="button" class="btn-menue">{{ link_to("/manufacturers/create", "Hersteller hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/articles/create", "Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue-act">{{ link_to("/warranties/create", "Garantie hinzufügen") }}</button>
@stop

@section('form')
    <h1>Neue Garantie erfassen</h1>

    {{ Form::open(['route' => 'warranties.store']) }}
        <div>
            {{ Form::label('Artikel_ID', 'Artikel') }}
            {{ Form::select('Artikel_ID', $artikel_options , Input::old('Artikel_ID')) }}
        </div>
        <div>
            {{ Form::label('Name', 'Name: ') }}
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
        <div>
            {{ Form::label('Dauer', 'Dauer: ') }}
            {{ Form::text('Dauer') }} Monate
            {{ $errors->first('Dauer') }}
        </div>
        {{ Form::submit('Garantie speichern') }}
    {{ Form::close() }}
@stop