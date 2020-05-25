<?php

namespace App\Http\Controllers;

use App\Article;
use App\fiche;
use App\ressource;
use Illuminate\Http\Request;

class firstcontroller extends Controller
{
    public function index(){
        return view("firstcontroller.home");
    } // cette fonction prend 3 articles (id : 1, 2 et 3) pour l'affichage sur la home ?

    public function search(Request $request){
        $fiches = fiche::where('nom','LIKE','%'.$request->input('search').'%')->where('status','=','confirme')->get();
        return view("firstcontroller.search",["fiches"=>$fiches]);
    }
}
