@extends('layouts.app', ['title' => __('Ajouter client'), 'pageSlug' => 'icons'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="title text-center">Ajouter un client</h3>
                </div>
                <div class="card-body all-icons">
                    <div class="row">
                        <div class="col-8 container">
                            <form class="form needs-validation" method="post" action="{{ route('add.client') }}" novalidate>
                                @csrf
                                @if($errors->any())
                                    <div class="alert alert-danger pb-1">
                                        <ul>
                                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-2">
                                        <label class="required" for="titre">Titre</label>
                                        <select class="form-control" name="titre">
                                            <option value="M.">M.</option>
                                            <option value="Mme.">Mme.</option>
                                            <option value="Mlle.">Mlle.</option>
                                        </select>
                                    </div>
                                    <div class="col {{ $errors->has('prenom') ? ' has-danger' : '' }}">
                                        <label class="required" for="prenom">Prenom</label>
                                        <input type="text" class="form-control{{ session()->has('prenom') ? ' is-invalid' : '' }}" placeholder="Prenom" name="prenom">
                                    </div>
                                    <div class="col {{ $errors->has('nom') ? ' has-danger' : '' }}">
                                        <label class="required" for="prenom">Nom</label>
                                        <input type="text" class="form-control{{ session()->has('nom') ? ' is-invalid' : '' }}" placeholder="Nom" name="nom">
                                        @include('alerts.feedback', ['field' => 'nom'])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="ddn">Date de naissance</label>
                                        <input type="date" class="form-control" placeholder="Date de naissance" name="ddn">
                                    </div>
                                    <div class="col">
                                        <label for="profession">Profession</label>
                                        <input type="text" class="form-control" placeholder="Profession" name="profession">
                                    </div>
                                    <div class="col">
                                        <label for="address">Adresse</label>
                                        <input type="text" class="form-control" placeholder="Adresse" name="address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col {{ $errors->has('tele') ? ' has-danger' : '' }}">
                                        <label class="required" for="tele">Numero du telephone</label>
                                        <input type="text" class="form-control{{ session()->has('tele') ? ' is-invalid' : '' }}" placeholder="Numero du telephone" name="tele">
                                        @include('alerts.feedback', ['field' => 'tele'])
                                    </div>
                                    <div class="col {{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="required" for="email">Email</label>
                                        <input type="text" class="form-control{{ session()->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label class="required" for="typepiece">Type de piece</label>
                                        <select class="form-control" name="typepiece">
                                            <option>Carte Nationle</option>
                                            <option>Permis de conduire</option>
                                            <option>Passport</option>
                                        </select>
                                    </div>
                                    <div class="col {{ $errors->has('numpiece') ? ' has-danger' : '' }}">
                                        <label class="required" for="numpiece">Numero du piece</label>
                                        <input type="text" class="form-control{{ session()->has('numpiece') ? ' is-invalid' : '' }}" placeholder="Numero du piece" name="numpiece">
                                        @include('alerts.feedback', ['field' => 'login'])
                                    </div>
                                    <div class="col {{ $errors->has('dde') ? ' has-danger' : '' }}">
                                        <label class="required" for="datavalide">Date d'expiration</label>
                                        <input type="date" class="form-control{{ session()->has('dde') ? ' is-invalid' : '' }}" placeholder="Date d'expiration" name="dde">
                                        @include('alerts.feedback', ['field' => 'dde'])
                                    </div>
                                </div>
                                <div class="row">
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
