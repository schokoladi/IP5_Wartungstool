@extends('layouts.main')
@extends('layouts.show')
@extends('layouts.table')

@section('menu')
<div id="breadcrumb">{{ link_to("/", "Home") }}</div>
@stop

@section('table')

<h1>Wartungsverträge</h1>

<button type="button" class="btn-new-WV">{{ link_to("/maintenance/create", "neuen Wartungsvertrag erfassen") }}</button>

<table>
<tr>
    <th>Name</th>
    <th>Kunde</th>
    <th>Kontaktperson</th>
</tr>
@foreach ($maintenance_collection as $maintenance)
    @if($maintenance->Vertragsnummer != NULL)
        <tr>
            <td>{{ link_to("maintenance/{$maintenance->Vertragsnummer}", $maintenance->Titel) }}</td>
            <td>{{ $maintenance->Name }}</td>
            <td>{{ $maintenance->Vorname }}</td>
        </tr>
    @endif
@endforeach
</table>
@stop
