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
            {!! Form::open(['route' => 'admin.accountings.pettycash.store', 'autocomplete' => 'off']) !!}

            <div class="mt-4 ml-4 form-row">
                <div class="col-2">
                    {!! Form::label('DATE', '') !!}
                    {!! Form::date('date', $dates, [
                        'class' => 'form-control text-right',
                        'placeholder' => 'Select the date',
                    ]) !!}
                </div>
                <div class="col-2">
                    {!! Form::label('NUMBER', '') !!}
                    {!! Form::text('number', $numeracion, [
                        'class' => 'form-control text-right',
                        /* 'disabled' => 'disabled', */
                    ]) !!}
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('MOVEMENT TYPE', '') !!}
                    <div class="form-group col-md-12">
                        <select class="form-control form-select form-select-lg mb-8"
                            aria-label="Ejemplo de .form-select-lg" name="movement_type">
                            <option value="">Movement type</option>
                            @foreach ($motions as $motion)
                                <option value="{{ $motion }}">{{ $motion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    {!! Form::label('DOCUMENT TYPE', '') !!}
                    <div class="form-group col-md-12">
                        <select class="form-control form-select form-select-lg mb-6"
                            aria-label="Ejemplo de .form-select-lg" name="document_type">
                            <option value="">Documents type</option>
                            @foreach ($documents as $document)
                                <option value="{{ $document }}">{{ $document }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4 float-right ">
                    {!! Form::label('PROVIDERS', '') !!}
                    <div class="form-group col-md-12">
                        <select class="form-control form-select form-select-lg mb-6"
                            aria-label="Ejemplo de .form-select-lg" name="providers">
                            <option value="">Providers</option>
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-3 float-right ">
                    {!! Form::label('SUPPLIES', '') !!}
                    <div class="form-group col-md-12">
                        <select class="form-control form-select form-select-lg mb-4"
                            aria-label="Ejemplo de .form-select-lg" name="supply">
                            <option value="">Supplies</option>
                            @foreach ($supplies as $supplie)
                                <option value="{{ $supplie->id }}">{{ $supplie->supply_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <div class="form-group col-md-12">
                        {!! Form::label('DESCRIPTION', '') !!}
                        {!! Form::text('description', null, ['class' => 'form-control', 'w-full', 'placeholder' => 'Enter description']) !!}
                    </div>
                </div>
                <div class="form-group col-md-1 ">
                    {!! Form::label('QTA', '') !!}
                    {!! Form::text('quantity', null, [
                        'class' => 'form-control text-right',
                        'placeholder' => 'qta',
                    ]) !!}
                </div>
                <div class="form-group col-md-2 ">
                    {!! Form::label('COST', '') !!}
                    {!! Form::text('cost_unit', null, [
                        'class' => 'form-control text-right',
                        'placeholder' => 'Enter the cost',
                    ]) !!}
                </div>


                {!! form::submit('Petty Cash Voucher Create', ['class' => 'form-control btn btn-success float-right mb-4 mr-4']) !!}
                <table class="table table-striped table-bordered table-sm mr-4">
                    <thead>
                        <tr>
                            <th class="text-center">MOVEMENT TYPE</th>
                            <th class="text-center">DOCUMENT TYPE</th>
                            <th class="text-center">PROVIDERS</th>
                            <th class="text-center">DESCRIPTION</th>
                            <th class="text-center">QUANTITIES</th>
                            <th class="text-center">UNIT COST</th>
                            <th class="text-center">TOTAL</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center" colspan="3">ACTION</th>
                        </tr>
                    </thead>
                </table>
                {{--    <div class="form-group inline" role="form"> --}}
                {{-- <div class="container">
                    <div class="inline float-right mr-2">
                        {!! Form::label('SUBTOTAL : ', null) !!}
                        {!! Form::text('subtotal', null, [
                            'class' => 'form-control border-success text-right',
                        ]) !!}
                    </div>
                </div> --}}
                {{--  </div> --}}
            </div>

            <div class="ml-4 form-row">

            </div>
            <div class="mt-2 ml-4 form-row">
            </div>

            {{--   {!! form::submit('Petty Cash Voucher Create', ['class' => 'btn btn-success float-right mb-4 mr-2']) !!} --}}
            {!! form::close() !!}
        </div>
    </div>

</div>
