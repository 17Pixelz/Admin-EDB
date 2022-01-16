<?php

namespace App\Http\Controllers;

use App\Models\Token;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    public function login(){
        if (session('token') != null)
            return redirect(route('dashboard'));
        return view('auth.login');
    }

    public function loginPost(){
        $client = new Client();
        $params = [
            'username'  => "ytouama",
            'password'  => "0645487765"
        ];

        $response = $client->request("POST", config('app.auth_url').'signin', [
            'json'      =>  $params,
            'verify'    =>  false
        ]);

//        config(['token' => json_decode($response->getBody())->accessToken]);
        session(['token' => json_decode($response->getBody())->accessToken]);

        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerPost(){
        return view('auth.register');
    }


}
