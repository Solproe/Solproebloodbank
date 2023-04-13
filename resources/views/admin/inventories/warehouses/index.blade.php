@extends('adminlte::page')

@section('title', 'Warehouse')

@section('content_header')
    <h1>List Warehouse Request Supplies</h1>
@stop

@section('content')
    @livewire('admin.warehouse.requestsuppliesindex', ['supplies' => $supplies, 'message' => $message])
@stop
