<div class="card">

    <div class="card-heard">
        <div class="mt-3 mb-3 input-group">
            <input wire:model="search" class="mt-2 ml-4 mr-4 form-control " placeholder="Type what you want to search for">
            <div class="input-group-btn">
                <a class="mt-2 mr-2 btn btn-outline-info btn-med" href="{{ route('admin.providers.create') }}"> Providers
                    Create</a>

            </div>
        </div>
    </div>

    @if ($providers != null)
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm ">
                <thead>
                    <tr>
                        {{--  <th class="text-center">ID</th> --}}
                        <th class="text-center">TAX ID</th>
                        <th class="text-center">PROVIDERS</th>
                        <th class="text-center">STATE</th>
                        <th class="text-center">CITY</th>
                        <th class="text-center" colspan="3">ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($providers as $provider)
                        <tr>
                            {{--   @dd($provider) --}}
                            <td width="10px">{{ $provider->tax_identification }}</td>
                            <td class="col-md-4" width="12px">{{ $provider->name }}</td>
                            <td width="10px">{{ $provider->states->name }}</td>
                            <td width="10px">
                                @php
                                    if (isset($provider->ID_TOWN) and $provider->ID_TOWN != null) {
                                        echo $provider->towns->name;
                                    } else {
                                        echo 'null';
                                    }
                                @endphp
                            </td>

                            {{-- CREATE BUTTONS --}}
                            <div class="text-center col">
                                <td width="10px" align="center">
                                    <a class="far fa-edit btn btn-outline-info btn-med"
                                        href="{{ route('admin.providers.edit', $provider->id) }}"> Edit</a>
                                </td>
                                <td width="10px" align="center">
                                    <form action="{{ route('admin.providers.destroy', $provider->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="far fa-trash-alt btn btn-outline-danger btn-med">Remove</button>
                                    </form>
                                </td>
                                <td width="10px" align="center">
                                    <a class="far fa-chart-bar btn btn-outline-success btn-med"
                                        href="{{ route('admin.requestorings.edit', $provider->id) }}">Statistics</a>
                                </td>
                            </div>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{--  {{ $provider->links() }} --}}
        </div>
    @else
        <div class="card-body">
            <strong>There is no record</strong>
        </div>
    @endif

</div>
