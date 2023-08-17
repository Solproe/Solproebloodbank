@extends('adminlte::page')

@section('title', 'warehouse')

@section('content_header')
    <h1>List Warehouse Request Supplies</h1>
@stop

@section('content')
    @livewire('admin.warehouse.request-supplies-index', ['order_requests' => $order_requests])
@stop
