@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>List Customers</h1>
@stop

@section('content')
   @livewire('admin.requestorings-index')
@stop
