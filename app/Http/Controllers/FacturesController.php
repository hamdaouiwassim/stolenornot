<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propriete;
use App\Facture;
use App\Verification;
class FacturesController extends Controller
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
    public function create($id)
    {
        //
        $propriete=$propriete = Propriete::find($id);
        return view('proprietaires.ajouterFacture')->with('propriete',$propriete);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->input('facture');
        $file = $request->file('document');
        //Move Uploaded File
        $destinationPath = 'factures';
        $newname = uniqid().$file->getClientOriginalName();
        $file->move($destinationPath,$newname);
        $facture = new Facture();
        $facture->facture = $request->input('facture');
        $facture->document = $newname;
        $facture->idtelephone = $request->input('idtelephone');;
        $facture->save();
        $verification = new Verification();
        $verification->type = "Propriete";
        $verification->idtache = $facture->id ;
        $verification->etat = "Non Verifie";
        $verification->save();

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
}
