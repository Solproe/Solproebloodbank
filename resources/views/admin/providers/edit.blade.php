@extends('adminlte::page')

@section('title', 'Dashboar')

@section('content_header')
    <h1>Edit Providers</h1>
@stop

@section('content')
    @livewire('providers.providers-edit', ['provider' => $provider])
@stop
