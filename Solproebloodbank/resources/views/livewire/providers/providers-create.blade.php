<div>
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
            {!! Form::open(['route' => 'admin.providers.store', 'autocomplete' => 'off']) !!}
            <div class="mt-4 ml-4 form-row">
                <div class="form-group col-md-2">
                    {!! Form::label('TAX IDENTIFICATION', '') !!}
                    {!! Form::text('tax_identification', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Enter tax identification ',
                    ]) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('CHECK DIGIT', '') !!}
                    {!! Form::select('check_digital', $digits, null, [
                        'class' => 'form-control',
                        'text-align: right',
                        'placeholder' => 'Choose digit',
                    ]) !!}
                </div>
                <div class="form-group col-md-4 ">
                    {!! Form::label('TAX REGIME', '') !!}
                    {!! Form::select('id_regimens', $regimens, null, [
                        'class' => 'form-control',
                        'placeholder' => 'Choose regimens',
                    ]) !!}
                    {{-- {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter tax regime']) !!} --}}
                </div>
                <div class="form-group col-md-4 ">
                    {!! Form::label('EMAIL FOR ELECTRONIC BILLING', '') !!}
                    {!! Form::email('email', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Enter email for electronic billing',
                    ]) !!}
                </div>
                <div class="mt-2 ml-4 form-group col-md-11">
                    {!! Form::label('PROVIDERS', '') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter providers name']) !!}
                </div>
            </div>
            <div class="mt-2 ml-4 form-group col-md-11">
                {!! Form::label('ADDRESS', '') !!}
                {!! Form::text('address', null, ['class' => 'form-control', 'w-full', 'placeholder' => 'Enter address']) !!}
            </div>
            <div class="mt-4 ml-4 form-row">
                <div class="form-group col-md-4">
                    {!! Form::label('LEGAL REPRESENTATIVE', '') !!}
                    {!! Form::text('legal_representative', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Enter legal representative',
                    ]) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('CITIZENSHIP CARD', '') !!}
                    {!! Form::text('CITIZENSHIP_CARD', null, ['class' => 'form-control', 'placeholder' => 'Enter citizenshio card']) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('PHONES MOBILE', '') !!}
                    {!! Form::text('phones', null, ['class' => 'form-control', 'placeholder' => 'Enter mobile phone']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('PHONES LANDLINE', '') !!}
                    {!! Form::text('LANDLINE', null, ['class' => 'form-control', 'placeholder' => 'Enter landline phone']) !!}
                </div>
            </div>
            <div class="ml-4 form-row">
                <div class="col-md-2 ">

                    {!! Form::label('STATE', 'State') !!}
                    <select wire:model='selectedState'class="mb-4 form-select form-select-lg"
                        aria-label="Ejemplo de .form-select-lg" name="ID_STATE">
                        <option value="">Choose States</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->ID_STATE }}">{{ $state->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-4 ">
                    <div class="col-md-2 ">
                        {!! Form::label('TOWN', '') !!}
                        <select wire:model='selectedTown' class="mb-3 form-select form-select-lg"
                            aria-label="Default select example" name="ID_TOWN">
                            <option value="">Choose Towns</option>
                            @if ($towns != null)
                                @foreach ($towns as $town)
                                    <option value="{{ $town->ID_TOWN }}">{{ $town->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                {{-- <div class="form-group col-md-3">
                    {!! Form::label('NEIGHBORHOOD', '') !!}
                    <select id="inputState" class="form-control">
                        <option selected>Choose neighborhood</option>
                        <option>...</option>
                    </select>
                </div> --}}
            </div>
            <div class="mt-2 ml-4 form-row">
            </div>
            {!! form::submit('Providers Create', ['class' => 'btn btn-success float-right mb-4 mr-2']) !!}
            {!! form::close() !!}
        </div>
    </div>

</div>
