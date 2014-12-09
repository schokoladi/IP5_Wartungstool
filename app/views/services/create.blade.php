@extends('layouts.main')
@extends('layouts.create')

@section('nav')
<button type="button" class="btn-menue">{{ link_to("/maintenance/create", "WA erfassen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/maintenancearticles/create", "WV-Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue-act">{{ link_to("/services/create", "Service hinzufügen") }}</button>
@stop

@section('form')
    <h1>Service hinzufügen</h1>
    {{ Form::open(['route' => 'services.store']) }}
    <table>
        <tr>
            <td class="col1">{{ Form::label('Wartungsvertraege_ID', 'Wartungsvertrag:') }}</td>
            <td class="col2">{{ Form::select('Wartungsvertraege_ID', $maintenance_options, $maintenance_id) }}</td>
            <td class="col3"></td>
            <td class="col4"></td>
            <td class="col5"></td>
            <td class="col6"></td>
        </tr>
        <tr>
            <td class="col1">{{ Form::label('Titel', 'Titel: ') }}</td>
            <td class="col2">{{ Form::text('Titel') }}</td>
            <td class="col3"> {{ $errors->first('Titel') }}</td>
            <td class="col4">{{ Form::label('Artikelnummer', 'Artikelnummer: ') }}</td>
            <td class="col5">{{ Form::text('Artikelnummer') }}</td>
            <td class="col6">{{ $errors->first('Artikelnummer') }}</td>
        </tr>
        <tr>
            <td class="col1"> {{ Form::label('Beschreibung', 'Beschreibung: ') }}</td>
            <td class="col2" colspan="2">{{ Form::textarea('Beschreibung') }}</td>
            <td class="col3"></td>
            <td class="col4"></td>
            <td class="col5"></td>
            <td class="col6"></td>
        </tr>
        <tr>
            <td class="col1">{{ Form::label('Preis', 'Preis: ') }}</td>
            <td class="col2">CHF {{ Form::text('Preis') }}</td>
            <td class="col3"> {{ $errors->first('Preis') }}</td>
            <td class="col4">{{ Form::label('Kaufdatum', 'Kaufdatum: ') }}</td>
            <td class="col5">{{ Form::text('Kaufdatum') }}</td>
            <td class="col6">{{ $errors->first('Kaufdatum') }}</td>
        </tr>
    </table>
    {{ Form::submit('Service speichern', ['class' => 'btn']) }}
    {{ Form::close() }}
@stop