<div class="card">

    <div class="card-heard">
        <div class="mt-3 mb-3 input-group">
            <input wire:model="search" class="mt-2 ml-4 mr-4 form-control " placeholder="Type what you want to search for">
            <div class="input-group-btn">
                <a class="mt-2 mr-2 btn btn-outline-info btn-med"
                    href="{{ route('admin.requestorings.create') }}">Create</a>
                {{-- <button class="float-right mr-4 btn btn-outline-info btn-sm">Create</button> --}}
            </div>
        </div>
    </div>

    @if ($requestorings != null)

        <div class="card-body">
            <table class="table table-striped table-bordered table-sm ">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">TAX ID</th>
                        <th class="text-center">CUSTOMER</th>
                        <th class="text-center">STATE</th>
                        <th class="text-center">CITY</th>
                        <th class="text-center" colspan="3">ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($requestorings as $requestoring)
                        <tr>
                            <td width="10px">{{ $requestoring->ID_REQUESTORIG }}</td>
                            <td width="10px">{{ $requestoring->NIT }}</td>
                            <td class="col-md-4" width="12px">{{ $requestoring->DES_REQUESTORIG }}</td>
                            <td width="10px">
                                @php
                                    if (isset($requestoring->ID_STATE) and $requestoring->ID_STATE != null) {
                                        echo $requestoring->states->name;
                                    } else {
                                        echo 'null';
                                    }
                                @endphp
                                {{--   {{ $requestoring->states->name }}</td> --}}
                                {{--  @dd($requestoring->ID_TOWN) --}}
                            <td width="10px">
                                @php
                                    if (isset($requestoring->ID_TOWN) and $requestoring->ID_TOWN != null) {
                                        echo $requestoring->towns->name;
                                    } else {
                                        echo 'null';
                                    }
                                @endphp
                            </td>

                            {{-- CREATE BUTTONS --}}
                            <div class="text-center col">
                                <td width="4px" align="center">
                                    <a class="far fa-edit btn btn-outline-info btn-med"
                                        href="{{ route('admin.requestorings.edit', $requestoring->ID_REQUESTORIG) }}">
                                    </a>
                                </td>
                                <td width="4px" align="center">
                                    <form action="{{ route('admin.requestorings.destroy', $requestoring) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button type="submit" class="btn btn-outline-danger btn-med">Remove</button> --}}
                                        <a type="submit" class="far fa-trash-alt btn btn-outline-danger btn-med">
                                        </a>
                                    </form>
                                </td>
                                <td width="4px" align="center">
                                    <a class="far fa-chart-bar btn btn-outline-success btn-med"
                                        href="{{ route('admin.requestorings.edit', $requestoring->ID_REQUESTORIG) }}">
                                    </a>
                                </td>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $requestorings->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>There is no record</strong>
        </div>


    @endif
</div>
