@extends('layouts.main')
@extends('layouts.create')

@section('nav')
<button type="button" class="btn-menue">{{ link_to("/maintenance/create", "WA erfassen") }}</button>
<button type="button" class="btn-menue-act">{{ link_to("/maintenancearticles/create", "WV-Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/services/create", "Service hinzufügen") }}</button>
@stop

@section('form')
    <h1>Neuen Wartungsvertragsartikel erfassen</h1>

    {{ Form::open(['route' => 'maintenancearticles.store']) }}
        <div>
            {{ Form::label('Wartungsvertraege_ID', 'Wartungsvertrag') }}
            {{ Form::select('Wartungsvertraege_ID', $maintenance_options, $maintenance_id) }}
        </div>
        <div>
            {{ Form::label('Artikelhersteller_ID', 'Hersteller') }}
            {{ Form::select('Artikelhersteller_ID', $manufacturer_options, $manufacturer_id, ['onChange' => 'this.form.submit()']) }}
        </div>
        @if(!empty($article_options))
            <div>
                {{ Form::label('Artikel_ID', 'Artikel') }}
                {{ Form::select('Artikel_ID', $article_options, $article_id, ['onChange' => 'this.form.submit()']) }}
            </div>
        @endif
        @if(!empty($warranty_options))
        <div>
            {{ Form::label('Wartungsartikelhersteller_ID', 'Garantie') }}
            {{ Form::select('Wartungsartikelhersteller_ID', $warranty_options) }}
        </div>
        @endif
        <div>
            {{ Form::label('Titel', 'Titel: ') }}
            {{ Form::text('Titel') }}
            {{ $errors->first('Titel') }}
        </div>
        <div>
            {{ Form::label('Seriennummer', 'Seriennummer: ') }}
            {{ Form::text('Seriennummer') }}
            {{ $errors->first('Seriennummer') }}
        </div>
        <div>
            {{ Form::label('Beschreibung', 'Beschreibung: ') }}
            {{ Form::textarea('Beschreibung') }}
        </div>
        {{ Form::submit('Wartungsvertragsartikel speichern', ['class'=>'btn', 'name' => 'store']) }}
    {{ Form::close() }}
@stop