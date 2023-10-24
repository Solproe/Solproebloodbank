@extends('adminlte::page')

@section('content')

<table class="table">
    <thead>
        <tr>
        </tr>
    </thead>
    <tbody>
        @foreach($centers as $center)
        <td>
            <form action="{{ route('admin.center.update', $center) }}" method="POST">
                @csrf
                @method("PUT")
                <input type="text" placeholder="{{ $center->DES_CENTRE }}" title="{{ $center->DES_CENTRE }}" name="DES_CENTRE">
                <input type="text" placeholder="{{ $center->COD_CENTRE }}" title="{{ $center->COD_CENTRE }}" name="COD_CENTRE">
                <input type="text" placeholder="{{ $center->TAX_IDENTIFICATION }}" title="{{$center->TAX_IDENTIFICATION}}" name="TAX_IDENTIFICATION">
                <input type="text" placeholder="{{ $center->ADDRESS }}" title="{{$center->ADDRESS}}" name="ADDRESS">
                <input type="text" placeholder="{{ $center->PUBLIC_IP}}" title="{{$center->PUBLIC_IP}}" name="PUBLIC_IP">
                <input type="text" placeholder="{{ $center->DB_NAME}}" title="{{$center->DB_NAME}}" name="DB_NAME">
                <input type="text" placeholder="{{ $center->DB_USER}}" title="{{$center->DB_USER}}" name="DB_USER">
                <input type="text" placeholder="**********" title="**********" name="PASSWD">
                <button class="btn btn-outline-success" type="submit">
                    Update
                </button>
            </form>
        </td>
        @endforeach
    </tbody>
</table>
@endsection