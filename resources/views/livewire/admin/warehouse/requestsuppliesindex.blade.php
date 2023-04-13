<div>
    <!-- Checked checkbox -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>


    <table class="table  table-hover table-sm">
        <thead>
            <tr>
                <th>
                    <label for="">Select the group you are requesting</label>
                </th>
                <th>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="team_one">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Team one
                    </label>
                </th>
                <th>
                    <input class="form-check-input" type="radio" name="flexRadioDefault"id="team_two">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Team two
                    </label>
                </th>
                <th>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="team_three">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Team three
                    </label>
                </th>
            </tr>
        </thead>
    </table>


    <table class="table  table-hover table-sm ml-4 table-borderless">
        <tbody>
            <form action="{{ route('admin.inventories.warehouses.store') }}" method="POST">
                @csrf

                @foreach ($supplies as $supply)
                    <tr>
                        <td class="col-md-4 ml-4" width="12px">
                            <input class="form-check-input mb-2" type="checkbox" value="{{ $supply->id }}"
                                onclick="dd({{ $supply->supply_cod }})" />
                            <label class="form-check-label col-10"
                                style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif"
                                for="options">{{ $supply->supply_name }}
                            </label>
                        </td>

                        <td width="6px">
                            <input type="text" id="{{ $supply->supply_cod }}" name="supplies[{{ $supply->id }}]"
                                disabled>
                        </td>
                    </tr>
                @endforeach

                <script>
                    function dd(data) {
                        var inp = document.getElementById(data);
                        var button = document.getElementById('button');
                        if (inp.disabled === true) {
                            inp.disabled = false;
                            button.disabled = false;
                        } else {
                            inp.disabled = true;
                        }
                    }
                </script>
                <button id="button" class="btn-success float-right mb-4 mr-2" type="submit" disabled>Send</button>
            </form>
            @push('js')
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    if ('{{ $message }}' !== '') {
                        Swal.fire(
                            'The Internet?',
                            '{{ $message }}',
                            'question'
                        );
                    }
                </script>
            @endpush

        </tbody>
    </table>
    {{-- <div class="card-footer">
        {{ $supplies->links() }}
    </div> --}}


</div>
