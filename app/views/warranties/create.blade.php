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
            <td class = "col3">{{ Form::label('Name', 'Name: ') }} {{ $errors->first('Name') }}</td>
            <td class = "col4">{{ Form::text('Name', null, ['size'=>'30']) }}</td>
        </tr>
        <tr>
             <td class = "col1">{{ Form::label('Beschreibung', 'Beschreibung: ') }}</td>
             <td class = "col2" rowspan ="1">{{ Form::textarea('Beschreibung') }}</td>
             <td class = "col3">{{ Form::label('Einkaufspreis', 'Einkaufspreis:') }} {{ $errors->first('Einkaufspreis') }}</td>
             <td class = "col4">{{ Form::text('Einkaufspreis', null, ['size'=>'8'])}} CHF</td>
        </tr>
        <tr>
             <td class = "col1"></td>
             <td class = "col2"></td>
             <td class = "col3">{{ Form::label('Verkaufspreis', 'Verkaufspreis: ') }} {{ $errors->first('Verkaufspreis') }}</td>
             <td class = "col4">{{ Form::text('Verkaufspreis', null, ['size'=>'8']) }} CHF</td>
        </tr>
        <tr>
             <td class = "col1"></td>
             <td class = "col2"></td>
             <td class = "col3">{{ Form::label('Dauer', 'Dauer:') }} {{ $errors->first('Dauer') }}</td>
             <td class = "col4">{{ Form::text('Dauer', null, ['size'=>'8']) }} Monate</td>
        </tr>
        </table>

        {{ Form::submit('Garantie speichern', ["class"=>"btn"]) }}
    {{ Form::close() }}

@stop