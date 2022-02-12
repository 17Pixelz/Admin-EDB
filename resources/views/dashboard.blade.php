@extends('layouts.app', ['title' => __('Liste des transferts'), 'pageSlug' => 'tables'])

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
                                    reference Transfert
                                </th>
                                <th>
                                    date de Transfert
                                </th>
                                <th>
                                    Etat
                                </th>
                                <th>
                                    Client
                                </th>
                                <th>
                                    Agent
                                </th>
                                <th>
                                    Beneficiare
                                </th>
                                <th>
                                    Operation
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data as $trasnfert)
                                <tr>
                                    <td>
                                        {{ $trasnfert->transactionId }}
                                    </td>
                                    <td>
                                        {{ $trasnfert->referenceTransfert }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y H:i:s', strtotime($trasnfert->datedeTransfert)) }}
                                    </td>
                                    <td>
                                        {{ $trasnfert->etat }}
                                    </td>
                                    <td>
                                        {{ $trasnfert->client->nomclient }} {{ $trasnfert->client->prenomClient }}
                                    </td>
                                    <td>
                                        {{ $trasnfert->compteAgent->agent->user->username }}
                                    </td>
                                    <td>
                                        {{ $trasnfert->beneficiare->nom }} {{ $trasnfert->beneficiare->prenom }}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info p-2">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Aucun transfert est realise
                                    </td>
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
