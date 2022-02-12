<?php


use GuzzleHttp\Client;

if (!function_exists('load_data')){
    function load_data($url){
        $client = new Client();

        $headers = [
            'Authorization'  => "Bearer ".session('token'),
        ];

        $response = $client->request("GET", config('app.api_url').$url, [
            'headers' => $headers,
            'verify'    =>  false
        ]);

        return $response;
    }
}

if (!function_exists('post_data')){
    function post_data($url, $data = []){

        $headers = [
            'Authorization'  => "Bearer ".session('token'),
        ];
        $response = \Illuminate\Support\Facades\Http::withHeaders($headers)->post(config('app.api_url').$url,$data);

        return $response;
    }
}
