<?php

namespace App\Http\Controllers;

use App\Article;
use App\defi;
use App\fiche;
use App\ressource;
use Illuminate\Http\Request;

class firstcontroller extends Controller
{
    public function index(){
        $general = defi::where('defis.idJeu','=', '0')->inRandomOrder()->limit(3)->get();
        $propaljeux = fiche::join('oeuvrestored', function($join)
        {
            $join->on('animejeu.id', '=', 'oeuvrestored.idoeuvre');
        })->where('oeuvrestored.id', '<=', '3')->get();
        return view("firstcontroller.home",["general"=>$general,"propaljeux"=>$propaljeux]);
    } // cette fonction prend 3 articles (id : 1, 2 et 3) pour l'affichage sur la home ?

    public function search(Request $request){
        $fiches = fiche::where('nom','LIKE','%'.$request->input('search').'%')->where('status','=','confirme')->get();
        return view("firstcontroller.search",["fiches"=>$fiches]);
    }
    public function propositionjeu(){
        $jeu = fiche::where('animejeu.type','=', 'jeu')->inRandomOrder()->limit(4)->get();
        return view("firstcontroller.propositionjeu",["jeu"=>$jeu]);
    }
    public function propositionanime(){
        $anime = fiche::where('animejeu.type','=', 'anime')->inRandomOrder()->limit(4)->get();
        return view("firstcontroller.propositionanime",["anime"=>$anime]);
    }
}
