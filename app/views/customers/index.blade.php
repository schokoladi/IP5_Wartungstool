@extends('layouts.main')

@section('content')
    <h1>All customers</h1>
    @if($customers->count())
            @foreach ($customers as $customer)
                <li>{{ link_to("/customers/{$customer->Name}", $customer->Name) }}</li>
            @endforeach
        @else
            <p>No customers!</p>
        @endif
@stop