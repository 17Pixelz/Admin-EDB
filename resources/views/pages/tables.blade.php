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
                                    reference Transfert
                                </th>
                                <th>
                                    date de Transfert
                                </th>
                                <th>
                                    Etat
                                </th>
                                <th>
                                    Type de transfert
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
                                        {{ "Espece" ? $trasnfert->typeTransfert == "TransfertparAgent" : "Compte client"  }}
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
                                        <button class="btn btn-sm btn-info p-2" data-toggle="modal" data-target="#trans{{$trasnfert->transactionId}}">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="trans{{$trasnfert->transactionId}}" tabindex="-1" role="dialog" aria-labelledby="trans{{$trasnfert->transactionId}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="f{{ $trasnfert->transactionId  }}" method="POST" action="{{ route('updateType') }}">
                                                    @csrf
                                                    <input name="id" value="{{ $trasnfert->transactionId }}" hidden>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="etat">Etat:</label>
                                                            <select class="form-control" name="etat">
                                                                <option value="1">A servir</option>
                                                                <option value="2">Servie</option>
                                                                <option value="3">Extourné</option>
                                                                <option value="4">Restitué</option>
                                                                <option value="7">payé</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button form="f{{ $trasnfert->transactionId  }}" type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
