<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $response = load_data('transfert/all');


        $data = json_decode($response->getBody()->getContents());
        return view('dashboard', [
            'data' => $data->data
        ]);
    }
}
