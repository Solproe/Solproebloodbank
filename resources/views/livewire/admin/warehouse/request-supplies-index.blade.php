<div class="container">

    <div class="card">

        <div class="card-heard">
            <div class="mt-3 mb-3 input-group">
                <input wire:model="search" class="mt-2 ml-4 mr-4 form-control "
                    placeholder="Type what you want to search for">
                <div class="input-group-btn">
                    <a class="mt-2 mr-2 btn btn-outline-info btn-med"
                        href="{{ route('admin.inventories.warehouses.create') }}">Create</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered table-sm ">
                <thead>
                    <tr>
                        {{--  <th class="text-center">COD</th> --}}
                        {{--     <th class="text-center">NAME</th> --}}
                        <th class="text-center">TEAM</th>
                        <th class="text-center">CREATED_AT</th>
                        <th class="text-center">SUPPLY</th>
                        <th class="text-center">TYPE</th>
                        <th class="text-center" colspan="3">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @if (@isset($order_requests) and $order_requests != null)
                        @foreach ($order_requests as $order_request)
                            <tr>
                                {{--  @dd($order_request) --}}
                                <td class="col-md-2" width="12px" style="text-align: center">
                                    {{ $order_request->teams->name }}</td>
                                <td width="10px">
                                    {{ $order_request->created_at }}
                                </td>
                                <td style="text-align: center">
                                    {{ $order_request->supplies->supply_name }}
                                </td>
                                <td class="text-center">
                                    {{ $order_request->movement_type }}
                                </td>
                                <div class="text-center col">
                                    {{--
                                        <td width="10%" align="center">
                                        <a class="far fa-edit btn btn-outline-info btn-med"
                                            href="{{ route('admin.inventories.warehouses.edit', $order_request) }}">
                                            Edit</a>
                                    </td> 
                                        --}}

                                    <td width="10px" align="center">
                                        <form
                                            action="{{ route('admin.inventories.warehouses.destroy', $order_request->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="far fa-trash-alt btn btn-outline-danger btn-med">
                                                Remove</button>
                                        </form>
                                    </td>
                                    {{-- 
                                        <td width="10px" align="center">
                                            <a class="far fa-chart-bar btn btn-outline-success btn-med"
                                                href="{{ route('admin.inventories.warehouses.edit', $order_request->id) }}">
                                                Pack off</a>
                                        </td>
                                        --}}

                                </div>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
