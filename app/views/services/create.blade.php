@extends('layouts.main')
@extends('layouts.create')

@section('menu')
<div id="breadcrumb">{{ link_to("/", "Home") }} > {{ link_to("/show", "Wartungsverträge") }}</div>
@stop

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
        </tr>
        <tr>
            <td class="col1">{{ Form::label('Titel', 'Titel: ') }}</td>
            <td class="col2" colspan="1">{{ Form::text('Titel', null, ['size' => '30']) }}</td>
            <td class="col3">{{ Form::label('Artikelnummer', 'Artikelnummer: ') }} {{ $errors->first('Artikelnummer') }}</td>
            <td class="col4">{{ Form::text('Artikelnummer') }}</td>
        </tr>
        <tr>
            <td class="col1"> {{ Form::label('Beschreibung', 'Beschreibung: ') }}</td>
            <td class="col2" colspan="2">{{ Form::textarea('Beschreibung', null, [
                'rows' => '10',
                'cols' => '10'
            ]) }}</td>
            <td class="col4"></td>
        </tr>
        <tr>
            <td class="col1">{{ Form::label('Preis', 'Preis: ') }} {{ $errors->first('Preis') }}</td>
            <td class="col2">{{ Form::text('Preis', null, ['size'=>'8']) }} CHF</td>
            <td class="col3">{{ Form::label('Kaufdatum', 'Kaufdatum: ') }} {{ $errors->first('Kaufdatum') }}</td>
            <td class="col4">{{ Form::text('date', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Pick the date this task should be completed', 'id' => 'calendar')) }}</td>
        </tr>
    </table>
    {{ Form::submit('Service speichern', ['class' => 'btn']) }}
    {{ Form::close() }}
@stop