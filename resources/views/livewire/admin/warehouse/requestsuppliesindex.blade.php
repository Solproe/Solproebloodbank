<div>

    <!-- Checked checkbox -->

    <div class="col-8 form-check">
        @foreach ($supplies as $supply)
            <div class="row">
                <div class="col">
                    <input class="form-check-input" type="checkbox" value="{{ $supply->listado }}" id="options" />
                    <label class="form-check-label" for="options">{{ $supply->supply_name }}</label>
                </div>
                <div class="col">
                    <input type="text">
                </div>

            </div>
        @endforeach
    </div>

</div>
