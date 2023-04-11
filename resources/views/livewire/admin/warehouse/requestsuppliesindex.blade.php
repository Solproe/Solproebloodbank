<div>

    <!-- Checked checkbox -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <div class="col-8 form-check">

        <form action="{{ route('admin.inventories.warehouses.store') }}" method="POST">
            @csrf

            @foreach ($supplies as $supply)
                <div class="row">

                    <div class="col">
                        <input class="form-check-input" type="checkbox" value="{{ $supply->listado }}"
                            onclick="dd({{ $supply->supply_cod }})" />
                        <label class="form-check-label"
                            style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif"
                            for="options">{{ $supply->supply_name }}</label>
                    </div>
                    <div class="col">
                        <input type="text" id="{{ $supply->supply_cod }}" name="supplies[{{ $supply->id }}]"
                            disabled>
                    </div>
                </div>



                <script>
                    function dd(data) {
                        var inp = document.getElementById(data);

                        if (inp.disabled === true) {
                            inp.disabled = false;
                        } else {
                            inp.disabled = true;
                        }

                    }
                </script>
            @endforeach

            <button type="submit" class="btn btn-outline-success">Send</button>

        </form>
    </div>

</div>
