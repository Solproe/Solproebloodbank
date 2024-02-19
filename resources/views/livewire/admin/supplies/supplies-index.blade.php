<div class="container">

    <div class="card">

        <div class="card-heard">
            <div class="mt-3 mb-3 input-group">
                <input wire:model="search" class="mt-2 ml-4 mr-4 form-control "
                    placeholder="Type what you want to search for">
                <div class="input-group-btn">
                    <a class="mt-2 mr-2 btn btn-outline-info btn-med"
                        href="{{ route('admin.inventories.supplies.create') }}">Create</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered table-sm ">
                <thead>
                    <tr>
                        {{--  <th class="text-center">COD</th> --}}
                        <th class="text-center">NAME</th>
                        <th class="text-center">DESCRIPTION</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center" colspan="3">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($allSupplies) and $allSupplies != null)
                    @foreach ($allSupplies as $supply)
                    <tr>

                        <td width="10px">{{ $supply->supply_name }}</td>
                        <td class="col-md-4" width="12px">{{ $supply->supply_description }}</td>
                        <td width="10px">{{ $supply->status_id->status_name }}</td>

                        <div class="text-center col">
                            <td width="10%" align="center">
                                <a class="far fa-edit btn btn-outline-info btn-med"
                                    href="{{ route('admin.inventories.supplies.edit', $supply) }}"> Edit</a>
                            </td>
                            <td width="10px" align="center">
                                <form action="{{ route('admin.inventories.supplies.destroy', $supply->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="far fa-trash-alt btn btn-outline-danger btn-med">
                                        Remove</button>
                                </form>
                            </td>
                            <td width="10px" align="center">
                                <a class="far fa-chart-bar btn btn-outline-success btn-med"
                                    href="{{ route('admin.inventories.supplies.edit', $supply->id) }}">
                                    Statistics</a>
                            </td>
                        </div>
                    </tr>
                @endforeach    
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
