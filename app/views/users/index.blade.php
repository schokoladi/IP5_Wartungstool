@extends('layouts.default')

@section('content')
    <h1>Alle User</h1>
    @if($users->count())
        @foreach ($users as $user)
            <li>{{ link_to("/users/{$user->Name}", $user->Name) }}</li>
        @endforeach
    @else
        <p>No Users!</p>
    @endif
@stop