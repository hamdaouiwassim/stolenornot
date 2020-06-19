<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verification;
use App\Facture;
use App\Propriete;

class VerificationsController extends Controller
{
    //
    public function valider($id){
        $verification = Verification::find($id);

        if ($verification->type == "Propriete"){
            $facture = Facture::find($verification->idtache);
            $propriete = Propriete::where('id_telephone',$facture->idtelephone)->get();
            $propriete[0]->etat = "Verifie";
            $propriete[0]->update();
            
            $verification->etat = "Verifie";
            $verification->update();
            return redirect('/home');
        }

    }
    public function refuser($id){
        $verification = Verification::find($id);

        if ($verification->type == "Propriete"){
            $facture = Facture::find($verification->idtache);
            $propriete = Propriete::where('id_telephone',$facture->idtelephone)->get();
            $propriete[0]->etat = "Refusee";
            $propriete[0]->update();
            $verification->etat = "Refusee";
            $verification->update();
            return redirect('/home');


        }

    }
}
