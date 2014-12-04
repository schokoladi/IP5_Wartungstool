@extends('layouts.main')
@extends('layouts.create')

@section('nav')
<button type="button" class="btn-menue-act">{{ link_to("/maintenance/create", "WA erfassen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/maintenancearticles/create", "WV-Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/services/create", "Service hinzufügen") }}</button>
@stop

@section('form')
    <h1>Neuen Wartungsvertrag erfassen</h1>

    {{ Form::open(['route' => 'maintenance.store']) }}
        @if(!empty($contact_options))
            <div>
            @foreach($customer_options as $customer)
                {{{ $customer }}}
            @endforeach
            </div>
            <div>
                {{ Form::label('Kontaktpersonen_ID', 'Kontaktperson') }}
                {{ Form::select('Kontaktpersonen_ID', $contact_options , Input::old('Kontaktpersonen_ID')) }}
            </div>
        @else
            <div>
                {{ Form::label('Kunden_ID', 'Kunde') }}
                {{ Form::select('Kunden_ID', $customer_options , Input::old('Kunden_ID'), ['onChange' => 'this.form.submit()']) }}
            </div>
        @endif
        <div>
            {{ Form::label('Titel', 'Titel: ') }}
            {{ Form::text('Titel') }}
            {{ $errors->first('Titel') }}
        </div>
        <div>
            {{ Form::label('Vertragsnummer', 'Vertragsnummer: ') }}
            {{ Form::text('Vertragsnummer') }}
            {{ $errors->first('Vertragsnummer') }}
        </div>
        <div>
            {{ Form::label('Beschreibung', 'Beschreibung: ') }}
            {{ Form::textarea('Beschreibung') }}
        </div>
        {{ Form::submit('Wartungsvertrag speichern', ['class' => 'btn']) }}
    {{ Form::close() }}
@stop