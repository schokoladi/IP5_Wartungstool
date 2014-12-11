@extends('layouts.main')
@extends('layouts.create')

@section('menu')
<div id="breadcrumb">{{ link_to("/", "Home") }} > {{ link_to("/show", "Artikel/Hersteller") }}</div>
@stop

@section('nav')
<button type="button" class="btn-menue">{{ link_to("/manufacturers/create", "Hersteller hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/articles/create", "Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue-act">{{ link_to("/warranties/create", "Garantie hinzufügen") }}</button>
@stop

@section('form')
    <h1>Neue Garantie erfassen</h1>

    {{ Form::open(['route' => 'warranties.store']) }}

        <table>
        <tr>
            <td class = "col1">{{ Form::label('Artikel_ID', 'Artikel:') }}</td>
            <td class = "col2">{{ Form::select('Artikel_ID', $artikel_options , Input::old('Artikel_ID')) }}</td>
            <td class = "col3"></td>
            <td class = "col4">{{ Form::label('Name', 'Name: ') }} {{ $errors->first('Name') }}</td>
            <td class = "col5">{{ Form::text('Name') }}</td>
            <td class = "col6"></td>
        </tr>
        <tr>
             <td class = "col1">{{ Form::label('Beschreibung', 'Beschreibung: ') }}</td>
             <td class = "col2">{{ Form::textarea('Beschreibung') }}</td>
             <td class = "col3"></td>
             <td class = "col4"></td>
             <td class = "col5"></td>
             <td class = "col6"></td>
        </tr>
        <tr>
             <td class = "col1">{{ Form::label('Einkaufspreis', 'Einkaufspreis (CHF):') }} {{ $errors->first('Einkaufspreis') }}</td>
             <td class = "col2">{{ Form::text('Einkaufspreis') }}</td>
             <td class = "col3"></td>
             <td class = "col4">{{ Form::label('Verkaufspreis', 'Verkaufspreis (CHF): ') }} {{ $errors->first('Verkaufspreis') }}</td>
             <td class = "col5">{{ Form::text('Verkaufspreis') }}</td>
             <td class = "col6"></td>
        </tr>
        <tr>
             <td class = "col1">{{ Form::label('Dauer', 'Dauer (Monate):') }} {{ $errors->first('Dauer') }}</td>
             <td class = "col2">{{ Form::text('Dauer') }}</td>
             <td class = "col3"></td>
             <td class = "col4"></td>
             <td class = "col5"></td>
             <td class = "col6"></td>
        </tr>
        </table>

        {{ Form::submit('Garantie speichern', ["class"=>"btn"]) }}
    {{ Form::close() }}

@stop