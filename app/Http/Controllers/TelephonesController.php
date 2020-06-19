<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Telephone;
use App\Propriete;
use Auth;

class TelephonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proprietaires.ajoutTelephone');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ajout telephone
        $telephone= new Telephone();
        $telephone->Modele = $request->input('modele');
        $telephone->Marque = $request->input('marque');
        $telephone->Description = $request->input('description');
        $telephone->id_propretaire = Auth::user()->proprietaire->id ;
        $telephone->date_achat = $request->input('dateachat');
        $telephone->imei = $request->input('imei');
        $telephone->save();

        // ajout propriete 
        $propriete = new Propriete();
        $propriete->id_proprietaire = Auth::user()->proprietaire->id;
        $propriete->id_telephone = $telephone->id;
        $propriete->etat = "Non Verifie";
        $propriete->save();

         return redirect('/home');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function decalarerVole($idtele){
            $propriete = Propriete::where('id_proprietaire',Auth::user()->proprietaire->id)
                                ->where('id_telephone',$idtele)
                                ->get();
   
            if(count($propriete) > 0 ){
                $propriete[0]->etat = "Volee";
                $propriete[0]->save();
            }
             return redirect('/home');

    }
}
