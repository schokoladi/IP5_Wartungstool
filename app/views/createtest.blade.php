@extends('layouts.main')
@extends('layouts.create')

@section('nav')
Artikel Info<br>
Garantie hinzufügen<br>
@stop

@section('form1')
<h1>Artikel Info</h1>
Hersteller
<select>
  <option value="option 1">option 1</option>
  <option value="option 2">option 2</option>
</select>
<textarea rows="1" cols="50">
</textarea><br>
Titel
<textarea rows="1" cols="50">
</textarea><br>
Name
<select>
  <option value="option 1">option 1</option>
  <option value="option 2">option 2</option>
</select>
<textarea rows="1" cols="50">
</textarea><br>
Artikelnummer
<textarea readonly rows="1" cols="50">
Einkaufspreis
<textarea rows="1" cols="30">
</textarea>
Verkaufspreis
<textarea rows="1" cols="30">
</textarea><br>

@stop

@section('form2')

<h1>Garantie</h1>
Dauer
<select>
  <option value="option 1">option 1</option>
  <option value="option 2">option 2</option>
  <option value="option 3">option 3</option>
</select>
Beschreibung
<textarea rows="1" cols="70">
</textarea><br>


@stop
