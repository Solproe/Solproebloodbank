@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>List Providers</h1>
@stop

@section('content')
    {{--  {{ $providers }} --}}
    @livewire('providers.providers-index', ['providers' => $providers])
@stop
