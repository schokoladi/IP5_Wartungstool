@extends('layouts.main')

@section('menu')
{{ link_to("/", "Home") }}
@stop

@section('content')

<h1>Wartungstool</h1>


<table id="main">
    <tr>
        <td class="colleft"><button type="button" class="btn-main">{{ link_to("/manufacturers/create", "Artikel/Hersteller") }}</button></td>
        <td class="colright"><button type="button" class="btn-main">{{ link_to("/maintenance", "Wartungsverträge") }}</button></td>
    </tr>
    <tr>
        <td class="colleft"><button type="button" class="btn-main">{{ link_to("", "Rechnungen") }}</button></td>
        <td class="colright"><button type="button" class="btn-main">{{ link_to("", "Reports") }}</button></td>
    </tr>
</table>

@stop