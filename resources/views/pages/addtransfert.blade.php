@extends('layouts.app', ['title' => __('Ajouter Trasnfert'), 'pageSlug' => 'icons'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="title text-center">Ajouter une transfert</h3>
                </div>
                <div class="card-body all-icons">
                    <div class="row">
                        <div class="col-8 container">
                            <form class="form" method="post" action="{{ route('add.transfert') }}">
                                @csrf
                                @if($errors->any())
                                    <div class="alert alert-danger pb-1">
                                        <ul>
                                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                                        </ul>
                                    </div>
                                @endif
                                <fieldset class="border border-dark p-3 mt-4">
                                    <legend>Emetteur</legend>
                                    <div class="row">
                                        <div class="col-8">
                                            <label class="required" for="client">Client</label>
                                            <select class="form-control" name="client">
                                                @forelse($clients as $client)
                                                    <option
                                                        value="{{ $client->carteidentite }}">{{ $client->prenomClient }} {{ $client->nomclient }}
                                                        | {{ $client->carteidentite }}</option>
                                                @empty
                                                    <option>Aucun client existe</option>
                                                @endforelse

                                            </select>
                                        </div>
                                        <div class="col-4 text-center">
                                            <label for="client">Nouveau Client</label>
                                            <a class="d-block" href="{{ route('client') }}"><button type="button" class="btn btn-info">Ajouter client</button></a>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="border border-dark p-3 mt-4">
                                    <legend>Beneficiaire</legend>
                                    <div class="row">
                                        <div class="col">
                                            <label class="required" for="prenom">Prenom</label>
                                            <input type="text" class="form-control" placeholder="Prenom" name="prenom">
                                        </div>
                                        <div class="col">
                                            <label class="required" for="prenom">Nom</label>
                                            <input type="text" class="form-control" placeholder="Nom" name="nom">
                                        </div>
                                        <div class="col">
                                            <label class="required" for="tele">Numero de telephone</label>
                                            <input type="text" class="form-control" placeholder="Numero du telephone" name="tele">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="border border-dark p-3 mt-4">
                                    <legend>Operation</legend>
                                    <div class="row">
                                        <div class="col">
                                            <label class="required" for="montant">Montant</label>
                                            <input type="text" class="form-control" placeholder="Montant" name="montant">
                                        </div>
                                        <div class="col">
                                            <label class="required" for="delai">Delai</label>
                                            <input type="text" class="form-control" placeholder="Delai" name="delai">
                                        </div>
                                        <div class="col">
                                            <label class="required" for="frais">Type de frais</label>
                                            <select class="form-control" name="frais">
                                                <option value="1">charge client</option>
                                                <option value="2">charge bénéficiaire</option>
                                                <option value="3">partagés entre le client et le bénéficiaire</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="required" for="motif">Motif</label>
                                            <input type="text" class="form-control" placeholder="Motif" name="motif">
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row mt-4">
                                    <div class="col text-center">
                                        <button class="btn btn-secondary">Ajouter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
