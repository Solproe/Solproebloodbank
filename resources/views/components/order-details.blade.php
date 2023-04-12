@props(['suppliesorder', 'order'])

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-info btn-med mr-2 mt-2" data-toggle="modal" data-target="#exampleModal">
    Details
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.warehouse.transfer.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Movement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered table-sm ">
                        <thead>
                            <tr>
                                <th class="text-center">SUPPLIES_NAME</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliesorder as $supplyorder)
                                @if ($supplyorder->id_order == $order->id)
                                    <tr>
                                        <td class="col-sm-6" width="10px" class="text-left">
                                            {{ $supplyorder->supplies->supply_name }}
                                        </td>
                                        <td width="15%">
                                            <div class="input-group-btn">
                                                {{$supplyorder->quantity}}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>