@extends('layouts.main')

@section('content')
    <h1>Alle Artikel</h1>
    @if($articles->count())
    @foreach ($articles as $article)
        <li>{{ link_to("articles{$article->Name}", $article->Name) }}</li>
    @endforeach
    @else
        <p>Keine Artikel vorhanden</p>
    @endif
@stop