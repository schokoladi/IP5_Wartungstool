@extends('layouts.main')

@section('content')

<h1>Wartungstool</h1>


<div id="main">
<button type="button1" class="btn-main">{{ link_to("/manufacturers/create", "Artikel/Hersteller") }}</button>
<button type="button" class="btn-main">{{ link_to("/maintenance/create", "Wartungsverträge") }}</button>
<button type="button" class="btn-main">{{ link_to("", "Rechnungen") }}</button>
<button type="button" class="btn-main">{{ link_to("", "Reports") }}</button>

</div>

@stop