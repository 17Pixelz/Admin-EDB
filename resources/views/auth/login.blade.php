@if(session('token') != null)
    {{ redirect(route('dashboard')) }}
@endif
@extends('layouts.app', ['class' => 'login-page', 'title' => _('Login Page'), 'contentClass' => 'login-page'])

@section('content')
    <div class="col-md-10 text-center ml-auto mr-auto">
        <h3 class="mb-5">Enter your credentials to login</h3>
    </div>
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <form class="form" method="post" action="{{ route('loginPost') }}">
            @csrf
            <div class="card card-login card-white">
                <div class="card-body text-center">
                    <img class="w-50 img-fluid m-auto" src="https://icon-library.com/images/money-transfer-icon/money-transfer-icon-16.jpg" alt="">
                    <h3>Transfero</h3>
                    @include('alerts.feedback', ['field' => 'login'])
                    <div class="input-group{{ $errors->has('login') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="text" name="username" class="form-control{{ session()->has('login') ? ' is-invalid' : '' }}" placeholder="Username">
                    </div>
                    <div class="input-group{{ $errors->has('login') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" placeholder="{{ _('Password') }}" name="password" class="form-control{{ session()->has('login') ? ' is-invalid' : '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" href="" class="btn btn-secondary btn-lg btn-block mb-3">{{ _('Log in') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
