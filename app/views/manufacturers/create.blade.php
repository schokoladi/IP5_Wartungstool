@extends('layouts.main')
@extends('layouts.create')

@section('menu')
<div id="breadcrumb">{{ link_to("/", "Home") }} > {{ link_to("/articles", "Artikel/Hersteller") }}</div>
@stop

@section('nav')
<button type="button" class="btn-menue-act">{{ link_to("/manufacturers/create", "Hersteller hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/articles/create", "Artikel hinzufügen") }}</button>
<button type="button" class="btn-menue">{{ link_to("/warranties/create", "Garantie hinzufügen") }}</button>
@stop

@section('form')
    <h1>Neuen Hersteller erfassen</h1>

    {{ Form::open(['route' => 'manufacturers.store']) }}
        <table>
        <tr>
            <td class = "col1">{{ Form::label('Name', 'Herstellername: ') }} {{ $errors->first('Name') }}</td>
            <td class = "col2">{{ Form::text('Name') }}</td>
            <td class = "col3"></td>
            <td class = "col4"></td>

        </tr>
        </table>

        {{ Form::submit('Hersteller speichern', ["class"=>"btn"]) }}
    {{ Form::close() }}
@stop