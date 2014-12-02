@extends('layouts.main')

@section('content')
    <h1>Alle Artikel</h1>
    @if($artikels->count())
    @foreach ($artikels as $artikel)
        <li>{{ link_to("/artikel/{$artikel->Name}", $artikel->Name) }}</li>
    @endforeach
    @else
        <p>Keine Artikel vorhanden</p>
    @endif
@stop