@extends('layouts.main')
@extends('layouts.table')

@section('table')

<h1>Wartungsverträge</h1>
<table>
@foreach ($maintenance_collection as $maintenance)
    @if($maintenance->Vertragsnummer != NULL)
        <tr><td>{{ link_to("maintenance/{$maintenance->Vertragsnummer}", $maintenance->Titel) }}</td><td>{{ $maintenance->Name }}</td><td>{{ $maintenance->Vorname }}</td></tr>
    @endif
@endforeach
</table>
@stop