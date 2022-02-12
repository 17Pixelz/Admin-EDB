<?php

namespace App\Http\Controllers;

use \GuzzleHttp\Client;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function clients(){

        $response = load_data('clients');

        $data = json_decode($response->getBody()->getContents());
        return $data->_embedded->clients;
    }
    public function comptes(){

        $response = load_data('comptecls');

        $data = json_decode($response->getBody()->getContents());
        return $data->_embedded->comptes;
    }



}
