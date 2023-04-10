<div class="card">

    <div class="card-heard">
        <div class="input-group mb-3 mt-3">
            <input wire:model="search" class="form-control mt-2 ml-4 mr-4 " placeholder="Type what you want to search for">
            <div class="input-group-btn">
                <a class="btn btn-outline-info btn-med mr-2 mt-2"
                    href="{{ route('admin.requestorings.create') }}">Create</a>
                {{-- <button class="btn btn-outline-info btn-sm float-right mr-4">Create</button> --}}
            </div>
        </div>
    </div>

    @if ($requestorings->count())

        <div class="card-body">
            <table class="table table-striped table-bordered table-sm ">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">TAX ID</th>
                        <th class="text-center">CUSTOMER</th>
                        <th class="text-center">CITY</th>
                        <th class="text-center">STATE</th>
                        <th class="text-center" colspan="2">ACTION</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($requestorings as $requestoring)
                        <tr>
                            <td width="10px">{{ $requestoring->ID_REQUESTORIG }}</td>
                            <td width="10px">{{ $requestoring->NIT }}</td>
                            <td class="col-md-4" width="12px">{{ $requestoring->DES_REQUESTORIG }}</td>
                            <td width="10px">{{ $requestoring->DES_AREA }}</td>
                            <td width="10px">{{ $requestoring->states->DES_STATE }}</td>

                            {{-- CREATE BUTTONS --}}

                            <td width="10px">
                                <a class="btn btn-outline-info btn-med float-right"
                                    href="{{ route('admin.requestorings.edit', $requestoring) }}">Edit</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.requestorings.destroy', $requestoring) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Remove</button>
                                </form>
                            </td>
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
