@extends('layouts.app', ['title' => __('Ajouter client'), 'pageSlug' => 'icons'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="title text-center">Ajouter un agent</h3>
                </div>
                <div class="card-body all-icons">
                    <div class="row">
                        <div class="col-8 container">
                            <form class="form needs-validation" method="post" action="{{ route('add.agent.post') }}" novalidate>
                                @csrf
                                @if($errors->any())
                                    <div class="alert alert-danger pb-1">
                                        <ul>
                                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col {{ $errors->has('username') ? ' has-danger' : '' }}">
                                        <label class="required" for="username">Username</label>
                                        <input type="text" class="form-control{{ session()->has('username') ? ' is-invalid' : '' }}" placeholder="Username" name="username">
                                    </div>
                                    <div class="col {{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="required" for="password">Password</label>
                                        <input type="text" class="form-control{{ session()->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" value="password" readonly>
                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-6 {{ $errors->has('ncompte') ? ' has-danger' : '' }}">
                                        <label class="required" for="ncompte">Numero de compte</label>
                                        <input type="text" class="form-control" placeholder="Numero de compte" name="ncompte">
                                        @include('alerts.feedback', ['field' => 'ncompte'])
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
