<?php

namespace App\Http\Controllers;

use http\Env\Request;

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

    public function addAgent(){
        return view('pages.addagent');
    }

    public function addAgentPost(Request $request){

    }

    public function agents(){
        $response = load_data('admin/all');


        $data = json_decode($response->getBody()->getContents());
        return view('pages.agents',[
            'data'  =>  $data
        ]);
    }

}
