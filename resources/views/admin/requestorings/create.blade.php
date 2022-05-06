@extends('adminlte::page')

@section('title', 'Solproe')

@section('content_header')
    <h1>Customers Create</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <h6>Please correct the following errors</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card_body">
            {!! Form::open(['route' => 'admin.requestorings.store', 'autocomplete' => 'off']) !!}
            <div class="form-row ml-4 mt-4">
                <div class="form-group col-md-2">
                    {!! Form::label('TAX IDENTIFICATION', '') !!}
                    {!! Form::text('NIT', null, ['class' => 'form-control', 'placeholder' => 'Enter tax identification ']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('CHECK DIGIT', '') !!}
                    {!! Form::select('', $digits, null, ['class' => 'form-control', 'text-align: right', 'placeholder' => 'Choose digit']) !!}
                </div>
                <div class="form-group col-md-4 ">
                    {!! Form::label('TAX REGIME', '') !!}
                    {!! Form::select('regimens', $regimens, null, ['class' => 'form-control', 'placeholder' => 'Choose regimens']) !!}
                {{-- {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter tax regime']) !!} --}}
            </div>
            <div class="form-group col-md-4 ">
                {!! Form::label('EMAIL FOR ELECTRONIC BILLING', '') !!}
                {!! Form::email('correo', null, ['class' => 'form-control', 'placeholder' => 'Enter email for electronic billing']) !!}
            </div>
            <div class="form-group col-md-11 ml-4 mt-2">
                {!! Form::label('CUSTOMER', '') !!}
                {!! Form::text('DES_REQUESTORIG', null, ['class' => 'form-control', 'placeholder' => 'Enter customer name']) !!}
            </div>
        </div>
        <div class="form-group col-md-11 ml-4 mt-2">
            {!! Form::label('ADDRESS', '') !!}
            {!! Form::text('DES_ADDRESS', null, ['class' => 'form-control', 'w-full', 'placeholder' => 'Enter address']) !!}
        </div>
        <div class="form-row ml-4 mt-4">
            <div class="form-group col-md-4">
                {!! Form::label('LEGAL REPRESENTATIVE', '') !!}
                {!! Form::text('persona_encargada', null, ['class' => 'form-control', 'placeholder' => 'Enter legal representative']) !!}
            </div>
            <div class="form-group ">
                {!! Form::label('CITIZENSHIP CARD', '') !!}
                {!! Form::text('CITIZENSHIP_CARD', null, ['class' => 'form-control', 'placeholder' => 'Enter citizenshio card']) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('PHONES LANDLINE', '') !!}
                {!! Form::text('LANDLINE', null, ['class' => 'form-control', 'placeholder' => 'Enter landline']) !!}
            </div>
            <div class="form-group ">
                {!! Form::label('MOBILE PHONE', '') !!}
                {!! Form::text('MOBILE', null, ['class' => 'form-control', 'placeholder' => 'Enter mobile phone']) !!}
            </div>
        </div>
        <div class="form-row ml-4 mt-2">
            <div class="form-group ">
                {!! Form::label('STATE', '') !!}
                {!! Form::select('ID_STATE', $states, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4 ">
                {!! Form::label('TOWN', '') !!}
                {!! Form::select('DES_AREA', $towns, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('NEIGHBORHOOD', '') !!}
                <select id="inputState" class="form-control">
                    <option selected>Choose neighborhood</option>
                    <option>...</option>
                </select>
            </div>
        </div>
        <div class="form-row ml-4 mt-2">


        </div>
        {!! form::submit('Customer Create', ['class' => 'btn btn-success float-right mb-4 mr-2']) !!}
        {!! form::close() !!}
    </div>
</div>

@stop
