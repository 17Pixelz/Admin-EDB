<?php

namespace App\Http\Controllers;

use App\Models\Token;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use phpDocumentor\Reflection\Utils;

class AuthController extends Controller
{
    public function login(){
        if (session('token') != null)
            return redirect(route('dashboard'));
        return view('auth.login');
    }

    public function loginPost(Request $request){
        $client = new Client();
        $params = [
            'username'  => $request->username,
            'password'  => $request->password
        ];

        try{
            $response = $client->request("POST", config('app.auth_url').'signin', [
                'json'          =>  $params,
                'verify'        =>  false,
                'exceptions'    =>  false,
            ]);
            session(['role' => json_decode($response->getBody())->role]);
            session(['username' => json_decode($response->getBody())->username]);
            session(['id' => json_decode($response->getBody())->id]);
            session(['token' => json_decode($response->getBody())->accessToken]);
            if (session('role') == "admin"){
                return redirect(route('dashboard'));
            }else {
                return redirect(route('agent'));
            }
        }catch (\Exception $e){
            session()->flash('login','The data you provided is wrong');
        }

        return view('auth.login');
    }


    public function logout(){
        session(['token' => null]);
        session(['role' => null]);
        return redirect(route('login'));
    }


}
