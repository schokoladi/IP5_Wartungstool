@extends('layouts.main')
@extends('layouts.create')

@section('menu')
<div id="breadcrumb">{{ link_to("/", "Home") }} > {{ link_to("/articles", "Artikel/Hersteller") }}</div>
@stop

@section('nav')
<button type="button" class="btn-menue">{{ link_to("/manufacturers/create", "Hersteller hinzufügen") }}</button>
<button type="button" class="btn-menue-act">{{ link_to("/articles/create", "Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/warranties/create", "Garantie hinzufügen") }}</button>
@stop

@section('form')
    <h1>Neuen Artikel erfassen</h1>

    {{ Form::open(['route' => 'articles.store']) }}

    <table>
        <tr>
            <td class = "col1">{{ Form::label('Artikelhersteller_ID', 'Hersteller:') }}</td>
            <td class = "col2">{{ Form::select('Artikelhersteller_ID', $manufacturer_options , Input::old('Artikelhersteller_ID')) }}</td>
            <td class = "col3"></td>
            <td class = "col4"></td>
        </tr>
        <tr>
            <td class = "col1">{{ Form::label('Artikelnummer', 'Artikelnummer: ') }} {{ $errors->first('Artikelnummer') }}</td>
            <td class = "col2">{{ Form::text('Artikelnummer') }}</td>
            <td class = "col3">{{ HTML::decode(Form::label('Name', 'Artikelname: ')) }} {{ $errors->first('Name') }}</td>
            <td class = "col4">{{ Form::text('Name') }}</td>
        </tr>
        <tr>
            <td class = "col1">{{ Form::label('Beschreibung', 'Beschreibung: ') }}</td>
            <td class = "col2" rowspan="1">{{ Form::textarea('Beschreibung') }}</td>
            <td class = "col3">{{ Form::label('Einkaufspreis', 'Einkaufspreis:') }} {{ $errors->first('Einkaufspreis') }}</td>
            <td class = "col4">{{ Form::text('Einkaufspreis', null, ['size'=>'8']) }} CHF</td>
        </tr>
        <tr>
            <td class = "col1"></td>
            <td class = "col2"></td>
            <td class = "col3">{{ Form::label('Verkaufspreis', 'Verkaufspreis:') }} {{ $errors->first('Verkaufspreis') }}</td>
            <td class = "col4">{{ Form::text('Verkaufspreis', null, ['size'=>'8']) }} CHF</td>
        </tr>
    </table>

        {{ Form::submit('Artikel speichern', ["class"=>"btn"]) }}
    {{ Form::close() }}
@stop