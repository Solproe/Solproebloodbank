@extends('adminlte::page')

@section('title', 'Reports')

@section('content_header')
    <h1>Shipping Reports</h1>
@stop

@section('content')
    @vite('resources/css/app.css')
    <div class="py-6 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('admin.inventories.filter-report-controller')
        </div>
    </div>

@stop
