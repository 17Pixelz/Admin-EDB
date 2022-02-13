@extends('layouts.app', ['title' => __('Transferts'), 'pageSlug' => 'tables'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h2 class="card-title font-weight-bold text-center">Liste des transferts</h2>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <table class="table  text-center" id="">
                            <thead class=" text-primary">
                            <tr>
                                <th scope="col">
                                    ID
                                </th>
                                <th>
                                    username
                                </th>
                                <th>
                                    Numero de compte
                                </th>
                                <th>
                                    Operation
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data as $agent)
                                <tr>
                                    <td>{{ $agent->idAgent }}</td>
                                    <td>{{ $agent->user->username }}</td>
                                    <td>1</td>
                                    <td>
                                        <button class="btn btn-sm btn-info p-2" data-toggle="modal" data-target="#trans{{$agent->idAgent}}">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">0 Agents existents</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
