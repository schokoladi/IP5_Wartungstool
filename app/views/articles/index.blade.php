@extends('layouts.main')
@extends('layouts.show')
@extends('layouts.table')

@section('menu')
<div id="breadcrumb">{{ link_to("/", "Home") }}</div>
@stop

@section('table')

<h1>Artikel</h1>

<button type="button" class="btn-new-WV">{{ link_to("/articles/create", "Neuen Artikel") }}</button>

<table>
<tr>
    <th>Artikelnummer</th>
    <th>Name</th>
</tr>
@foreach ($articles as $article)
    @if($article->Artikelnummer != NULL)
        <tr>
            <td>{{ link_to("articles/{$article->Artikelnummer}", $article->Artikelnummer) }}</td>
            <td>{{ $article->Name }}</td>
        </tr>
    @endif
@endforeach
</table>
@stop