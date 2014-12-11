@extends('layouts.main')
@extends('layouts.create')

@section('menu')
<div id="breadcrumb">{{ link_to("/", "Home") }} > {{ link_to("/show", "Wartungsverträge") }}</div>
@stop

@section('nav')
<button type="button" class="btn-menue-act">{{ link_to("/maintenance/create", "WA erfassen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/maintenancearticles/create", "WV-Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/services/create", "Service hinzufügen") }}</button>
@stop

@section('form')
    <h1>Neuen Wartungsvertrag erfassen</h1>

    {{ Form::open(['route' => 'maintenance.store']) }}

    <table>
        <tr>
            <td class = "col1">{{ Form::label('Kunden_ID', 'Kunde:') }}</td>
            <td class = "col2">{{ Form::select('Kunden_ID', $customer_options , $customer_id, ['onChange' => 'this.form.submit()']) }}</td>
            @if(!empty($contact_options))
            <td class = "col3">{{ Form::label('Kontaktpersonen_ID', 'Kontaktperson:') }}</td>
            <td class = "col4">{{ Form::select('Kontaktpersonen_ID', $contact_options) }}</td>
            @endif
        </tr>
        <tr>
            <td class = "col1">{{ Form::label('Titel', 'Titel: ') }} {{ $errors->first('Titel') }}</td>
            <td class = "col2">{{ Form::text('Titel') }}</td>
            <td class = "col3">{{ Form::label('Vertragsnummer', 'Vertragsnummer: ') }} {{ $errors->first('Vertragsnummer') }}</td>
            <td class = "col4">{{ Form::text('Vertragsnummer') }}</td>
        </tr>
        <tr>
            <td class = "col1">{{ Form::label('Beschreibung', 'Beschreibung: ') }}</td>
            <td class = "col2" colspan="1">{{ Form::textarea('Beschreibung') }}</td>
            <td class = "col3"></td>
            <td class = "col4"></td>

        </tr>
    </table>

        {{ Form::submit('Wartungsvertrag speichern', ['class' => 'btn', 'name' => 'store']) }}
    {{ Form::close() }}
@stop