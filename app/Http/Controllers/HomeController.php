<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Telephone;
use App\Propriete;
use App\Verification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
       
        $proprietes = Propriete::where('id_proprietaire', Auth::user()->proprietaire->id)->get();
       
       

        


        if ( Auth::user()->roles == "Admin"){
            $verifications = Verification::where('etat','Non Verifie')->get();
            return view('admins.home')->with('verifications',$verifications);
        }else{
            return view('proprietaires.home')->with('proprietes',$proprietes);
        }
        
    }
}
