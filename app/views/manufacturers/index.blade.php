@extends('layouts.main')

@section('content')
    <h1>Alle Hersteller</h1>
    @if($herstellers->count())
    @foreach ($herstellers as $hersteller)
        <li>{{ link_to("/hersteller/{$hersteller->Name}", $hersteller->Name) }}</li>
    @endforeach
    @else
        <p>Keine Hersteller vorhanden</p>
    @endif
@stop