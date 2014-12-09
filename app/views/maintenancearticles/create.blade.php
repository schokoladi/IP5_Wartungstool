@extends('layouts.main')
@extends('layouts.create')

@section('menu')
<div id="breadcrumb">{{ link_to("/", "Home") }} > {{ link_to("/show", "Wartungsverträge") }}</div>
@stop

@section('nav')
<button type="button" class="btn-menue">{{ link_to("/maintenance/create", "WA erfassen") }}</button>
<button type="button" class="btn-menue-act">{{ link_to("/maintenancearticles/create", "WV-Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/services/create", "Service hinzufügen") }}</button>
@stop

@section('form')
    <h1>Neuen Wartungsvertragsartikel erfassen</h1>

    {{ Form::open(['route' => 'maintenancearticles.store']) }}

    <table>
        <tr>
            <td class = "col1">{{ Form::label('Wartungsvertraege_ID', 'Wartungsvertrag:') }}</td>
            <td class = "col2">{{ Form::select('Wartungsvertraege_ID', $maintenance_options, $maintenance_id) }}</td>
            <td class = "col3"></td>
            <td class = "col4">{{ Form::label('Artikelhersteller_ID', 'Hersteller:') }}</td>
            <td class = "col5">{{ Form::select('Artikelhersteller_ID', $manufacturer_options, $manufacturer_id, ['onChange' => 'this.form.submit()']) }}</td>
            <td class = "col6"></td>
        </tr>
        <tr>
            @if(!empty($article_options))
            <td class = "col1">{{ Form::label('Artikel_ID', 'Artikel:') }}</td>
            <td class = "col2">{{ Form::select('Artikel_ID', $article_options, $article_id, ['onChange' => 'this.form.submit()']) }}</td>
             @endif
            <td class = "col3"></td>
            @if(!empty($warranty_options))
            <td class = "col4">{{ Form::label('Wartungsartikelhersteller_ID', 'Garantie:') }}</td>
            <td class = "col5">{{ Form::select('Wartungsartikelhersteller_ID', $warranty_options) }}</td>
            @endif
            <td class = "col6"></td>
        </tr>
        <tr>
            <td class = "col1">{{ Form::label('Titel', 'Titel: ') }}</td>
            <td class = "col2">{{ Form::text('Titel') }}</td>
            <td class = "col3"> {{ $errors->first('Titel') }}</td>
            <td class = "col4">{{ Form::label('Seriennummer', 'Seriennummer: ') }}</td>
            <td class = "col5">{{ Form::text('Seriennummer') }}</td>
            <td class = "col6">{{ $errors->first('Seriennummer') }}</td>
        </tr>
        <tr>
            <td class = "col1"> {{ Form::label('Beschreibung', 'Beschreibung: ') }}</td>
            <td class = "col2" colspan="2">{{ Form::textarea('Beschreibung') }}</td>
            <td class = "col3"></td>
            <td class = "col4"></td>
            <td class = "col5"></td>
            <td class = "col6"></td>
        </tr>
    </table>

        {{ Form::submit('Wartungsvertragsartikel speichern', ['class'=>'btn', 'name' => 'store']) }}
    {{ Form::close() }}
@stop