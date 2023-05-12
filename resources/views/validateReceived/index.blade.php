@extends('adminlte::page')

@section('content')

@vite('resources/css/app.css')


<div class="border-b border-gray-900/10 pb-12">

    <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Consecutive</th>
                <th scope="col">Unities</th>
                <th scope="col">Boxes</th>
                <th scope="col">Status</th>
                <th scope="col">Through</th>
                <th scope="col">Date</th>
                <th scope="col">Received Date</th>
                <th scope="col">News</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($validateReceived as $validate)
                <tr>
                    <th scope="row"> {{$validate->consecutive}} </th>
                    <td> {{$validate->unities}} </td>
                    <td> {{$validate->boxes}} </td>
                    <td> {{$validate->status->status_name}} </td>
                    <td> {{$validate->through}} </td>
                    <td> {{$validate->date}} </td>
                    @if ($validate->received_date == null)
                        <td> NULL </td>
                    @else
                        <td> {{$validate->received_date}} </td>
                    @endif
                    @if ($validate->news == null)
                        <td> NULL </td>
                    @else
                        <td> {{$validate->news}} </td>
                    @endif

                    <td>
                        <form action="{{ route('admin.validatereceived.update', $validate->id) }}" method="PUT">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-warning">edit</button>
                        </form>

                        <form action="{{ route('admin.validatereceived.destroy', $validate->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">delete</button>
                        </form>
                    </span>
                    </td>

                  </tr>
                @endforeach
            </tbody>
          </table>

    </div>

</div>


@endsection
