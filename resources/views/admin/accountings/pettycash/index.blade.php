@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>Petty Cash</h1>
@stop

@section('content')
    @livewire('accountings.pettycasg-index', ['dates' => $dates])
@stop
