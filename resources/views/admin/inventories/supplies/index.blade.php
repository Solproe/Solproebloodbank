@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>List Supplies</h1>
@stop

@section('content')
    @livewire('admin.supplies.supplies-index')
@stop
