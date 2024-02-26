@extends('adminlte::page')

@section('title', 'Team-Users')

@section('content_header')
    <h1>List Users</h1>
@stop

@section('content')

    <div class="container">

        <div style="text-align: center; margin: 5% 3% 0% 3%">
            <h2>All Users</h2>
        </div>

        <div class="card">
            <div class="card-heard">
            </div>
            <table class="table table-striped table-bordered table-sm ">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody class="flex">
                    <div class="input-group mb-3 mt-3">
                        <div>
                            @foreach ($users as $user)
                            <tr>
                                <td align="center">
                                    <div>
                                        {{ $user->name }}
                                    </div>
                                </td>

                                <td align="center">
                                    <div>
                                        {{ $user->email }}
                                    </div>
                                </td>

                                <td>
                                    @if ($user->id_team == null)
                                    <div>
                                        <form action="{{ route('teams.addUser')}}" method="POST">
                                            @csrf
                                            <button class="btn btn-outline-success" type="submit" name="data[{{$team->id}}]" value={{$user->id}}>
                                                Add
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
        
        <div style="text-align: center; margin: 5% 3% 0% 3%">
            <h2>Added</h2>
        </div>

        <div>
            <table class="table table-striped table-bordered table-sm ">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody class="flex">
                    <div class="input-group mb-3 mt-3">
                        @foreach ($team_users as $user)
                        <tr>
                            <td align="center">
                                {{ $user->name }}
                            </td> 
                            <td class="row">
                                
                                <div class="ml-4">
                                    <form action="{{ route('teams.deleteUser')}}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-secondary" type="submit" name="data[{{$team->id}}]" value={{$user->id}}>
                                        Delete
                                    </button>
                                    </form>
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div>
    </div>

@stop
