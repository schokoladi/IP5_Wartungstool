@extends('layouts.main')
@extends('layouts.create')

@section('menu')
<div id="breadcrumb">{{ link_to("/", "Home") }} > {{ link_to("/show", "Artikel/Hersteller") }}</div>
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
            <td class = "col5"></td>
            <td class = "col6"></td>
        </tr>
        <tr>
            <td class = "col1">{{ Form::label('Artikelnummer', 'Artikelnummer: ') }}</td>
            <td class = "col2">{{ Form::text('Artikelnummer') }}</td>
            <td class = "col3">{{ $errors->first('Artikelnummer') }}</td>
            <td class = "col4">{{ HTML::decode(Form::label('Name', 'Artikelname: ')) }}</td>
            <td class = "col5">{{ Form::text('Name') }}</td>
            <td class = "col6">{{ $errors->first('Name') }}</td>
        </tr>
        <tr>
            <td class = "col1">{{ Form::label('Beschreibung', 'Beschreibung: ') }}</td>
            <td class = "col2" colspan="2">{{ Form::textarea('Beschreibung') }}</td>
            <td class = "col3"></td>
            <td class = "col4"></td>
            <td class = "col5"></td>
            <td class = "col6"></td>
        </tr>
        <tr>
            <td class = "col1">{{ Form::label('Einkaufspreis', 'Einkaufspreis:') }}</td>
            <td class = "col2">CHF {{ Form::text('Einkaufspreis') }}</td>
            <td class = "col3">{{ $errors->first('Einkaufspreis') }}</td>
            <td class = "col4">{{ Form::label('Verkaufspreis', 'Verkaufspreis:') }}</td>
            <td class = "col5">CHF {{ Form::text('Verkaufspreis') }}</td>
            <td class = "col6">{{ $errors->first('Verkaufspreis') }}</td>
        </tr>


    </table>

        {{ Form::submit('Artikel speichern', ["class"=>"btn"]) }}
    {{ Form::close() }}
@stop