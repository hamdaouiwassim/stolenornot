<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Propriete;
use App\Contratachat;
use App\Verification;
use App\Telephone;
use Hash;
class ContratsController extends Controller
{
    //
    public function create($id){
        $telephone = Telephone::find($id);
        return view('proprietaires.ajouterContrat')->with('telephone',$telephone);
    }
    public function store(Request $request){

        $acheteur = new User();
        $acheteur->email = $request->input('email');
        $acheteur->password = Hash::make($request->input('pw'));
        $acheteur->roles = "User";
        $acheteur->name = $request->input('nom');
        $acheteur->save();



        $file = $request->file('document');
        //Move Uploaded File
        $destinationPath = 'uploads/contrats';
        $filename = uniqid().$file->getClientOriginalName();
        $file->move($destinationPath,$filename);
        $contrat = new Contratachat();
        $contrat->document = $filename;
        $contrat->idacheteur = $acheteur->id ;
        $contrat->idvendeur = auth()->user()->proprietaire->id ;
        $contrat->idtelephone = $request->input('idtelephone');
        $contrat->etat = "En cours";
        $contrat->save();



        $propriete = Propriete::where('id_proprietaire',auth()->user()->proprietaire->id)
                    ->where('id_telephone',$request->input('idtelephone'))->get();
        $propriete[0]->etat = "En attente de confirmation de vente";
        $propriete[0]->update();



        $verification = new Verification();
        $verification->type = "Achat" ;
        $verification->idtache  = $contrat->id;
        $verification->etat  = "Non Verifie";
        $verification->save();

        return redirect("/home");

       
    }
}
