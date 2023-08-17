@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>Edit Customers</h1>
@stop

@section('content')
    @livewire('admin.requestorings-edit', ['requestoring' => $requestoring])
@stop
