<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function transferts(){
        $response = load_data('transfert/all');


        $data = json_decode($response->getBody()->getContents());
        return view('pages.tables', [
            'data' => $data->data
        ]);
    }

    public function addClient(){
        return view("pages.addclient");
    }


    public function addClientPost(Request $request){
        $request->validate([
            'prenom' => ['required'],
            'nom' => ['required'],
            'tele' => ['required'],
            'email' => ['required'],
            'typepiece' => ['required'],
            'numpiece' => ['required'],
            'dde' => ['required'],
        ]);

        $data = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'tele' => $request->tele,
            'typepiece' => $request->typepiece,
            'numpiece' => $request->numpiece,
            'dateexpirationpiece'=> $request->dde,
            'datenaissance'=>$request->ddn,
            'profession'=>$request->profession,
            'adresse'=>$request->address
        ];
        post_data('transfert/client/save',$data);

        echo "<script>setTimeout(function(){ window.location.href = '/agent'; }, 3000);</script>";
        return view('pages.notifications');
    }

    public function addTransfert(){
        $response = load_data('clients');


        $data = json_decode($response->getBody()->getContents());
        $data = $data->_embedded->clients;

        return view("pages.addtransfert",[
            'clients'   =>  $data
        ]);
    }


    public function addTransfertPost(Request $request){
        $request->validate([
            'prenom' => ['required'],
            'nom' => ['required'],
            'tele' => ['required'],
            'client' => ['required'],
            'montant' => ['required'],
            'frais' => ['required'],
            'delai' => ['required'],
            'motif' => ['required'],
            'type'  => ['required']
        ]);

        $data = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'gsm' => $request->tele
        ];
        $benif = json_decode(post_data('transfert/benificiare/save',$data)->getBody()->getContents());

        $data = [
            "identifiant"=>$request->client,
            "iduser"=>session('id'),
            "montant"=>$request->montant,
            "notif"=>true,
            "typedefrais"=>$request->frais,
            "idbeneficiaire"=>$benif->data->id,
            "delai"=>$request->delai,
            "motif"=>$request->motif
        ];

        if($request->type == "Agent"){
            $link = "transfert/newtransactionbyagentacc";
        }else{
            $link = "transfert/newtransactionbyclientacc";
        }
        post_data($link,$data);

        echo "<script>setTimeout(function(){ window.location.href = '/agent'; }, 3000);</script>";
        return view('pages.notifications');
    }

    public function updateType(Request $request){
        switch ($request->etat){
            case 1:post_data('transfert/aservir/'.$request->id);
                break;
            case 2:post_data('transfert/servie/'.$request->id);
                break;
            case 3:post_data('transfert/return/'.$request->id);
                break;
            case 4:post_data('transfert/reverse/'.$request->id);
                break;
            case 5:post_data('transfert/block/'.$request->id);
                break;
            case 6:post_data('transfert/unblock/'.$request->id);
                break;
            case 7:post_data('transfert/paye/'.$request->id);
                break;
            case 8:post_data('transfert/desherence/'.$request->id);
                break;
        }

        echo "<script>setTimeout(function(){ window.location.href = '/agent'; }, 3000);</script>";
        return view('pages.notifications');
    }

}
