@extends('layouts.main')
@extends('layouts.create')

@section('nav')
<button type="button" class="btn-menue-act">{{ link_to("/manufacturers/create", "Hersteller hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/articles/create", "Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/warranties/create", "Garantie hinzufügen") }}</button>
@stop

@section('form')
    <h1>Neuen Hersteller erfassen</h1>

    {{ Form::open(['route' => 'manufacturers.store']) }}
        <div>
            {{ Form::label('Name', 'Herstellername: ') }}
            {{ Form::text('Name') }}
            {{ $errors->first('Name') }}
        </div>
        <button type="button" class="btn">{{ Form::submit('Hersteller speichern') }}</button>
    {{ Form::close() }}
@stop