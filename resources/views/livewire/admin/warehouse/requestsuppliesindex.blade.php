<div>

    <!-- Checked checkbox -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <div class="col-8 form-check">

        <div class="row">

            <label class="mr-4" for="">Select the group you are requesting</label>

            <div class="row ml-4">
                <div>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="team_one">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Team one
                    </label>
                </div>
                <div class="form-check ml-4 mb-4">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="team_two">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Team two
                    </label>
                </div>
                <div class="row">
                    <div class="form-check ml-4 mb-4">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="team_three">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Team three
                        </label>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.inventories.warehouses.store') }}" method="POST">
                @csrf

                @foreach ($supplies as $supply)
                    <div class="row">

                        <div class="col-md-6" id="contenedor">
                            <div contenteditable="true">
                                <input class="form-check-input" type="checkbox" value="{{ $supply->listado }}"
                                    onclick="dd({{ $supply->supply_cod }})" />
                                <label class="form-check-label"
                                    style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif"
                                    for="options">{{ $supply->supply_name }}</label>
                            </div>

                        </div>
                        <div class="col-md-6">
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
