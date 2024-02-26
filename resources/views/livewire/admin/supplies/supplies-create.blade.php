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
        {!! Form::open(['route' => 'admin.inventories.supplies.store', 'autocomplete' => 'off']) !!}
        <div class="mt-4 ml-4 form-row">
            <div class="form-group col-md-2">
                {!! Form::label('CODE', '') !!}
                {!! Form::text('supply_cod', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Enter tax identification ',
                ]) !!}
            </div>
            <div class="form-group ">
                {!! Form::label('Name', '') !!}
                {!! Form::text('supply_name', null, [
                    'class' => 'form-control',
                    'text-align: right',
                    'placeholder' => 'Choose digit',
                ]) !!}
            </div>
            <div class="mb-2 ml-4 mr-4">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" placeholder="Enter Description" name="supply_description" id="Description" rows="3"></textarea>
            </div>

            <div class="mt-4 ml-4 form-row">
                <div class="ml-5 col form-group">
                    {!! Form::label('Provider', '') !!}
                    <select name="provider" id="">
                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id}}">{{ $provider->name }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>

            
        </div>
        <div class="mt-4 ml-4 form-row">
            <div class="mt-4 ml-4 form-row">
                <div class="ml-5 col form-group ">
                    {!! Form::label('status', '') !!}
                    <select class="from-control" name="status">
                        @foreach ($status as $statuses)
                            <option value={{ $statuses->id }}>{{ $statuses->status_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 ml-4 form-row mb-3">
        {!! form::submit('Supplies Create', ['class' => 'btn btn-success']) !!}
        {!! form::close() !!}
    </div>
    
</div>
