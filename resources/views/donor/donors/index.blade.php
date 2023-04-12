@extends('adminlte::page')

@section('title','Dashboar')
@section('content')
@foreach($response[0] as $response2)
{{$response2}}
@endforeach
@foreach($response[1] as $people)
@foreach($people as $data)
{{$data}}
@endforeach
@endforeach

@stop
