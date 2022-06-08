
@extends('adminlte::page')

@section('title','Dashboar')

@section('content_header')
    <h1>Donor Consult</h1>
@stop

@section('content')
@livewire('click-event')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
