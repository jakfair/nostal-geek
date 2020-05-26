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
        $propalanimes = fiche::join('oeuvrestored', function($join)
        {
            $join->on('animejeu.id', '=', 'oeuvrestored.idoeuvre');
        })->wherebetween('oeuvrestored.id', ['4', '6'])->get();
        $propalcinemas = fiche::join('oeuvrestored', function($join)
        {
            $join->on('animejeu.id', '=', 'oeuvrestored.idoeuvre');
        })->wherebetween('oeuvrestored.id', ['7', '9'])->get();
        return view("firstcontroller.home",["general"=>$general,"propaljeux"=>$propaljeux,"propalanimes"=>$propalanimes,"propalcinemas"=>$propalcinemas]);
    }

    public function search(Request $request){
        $fiches = fiche::where('nom','LIKE','%'.$request->input('search').'%')->where('status','=','confirme')->get();
        return view("firstcontroller.search",["fiches"=>$fiches]);
    }
    public function propositionjeu(){
        $jeux = fiche::join('oeuvrestored', function($join)
        {
            $join->on('animejeu.id', '=', 'oeuvrestored.idoeuvre');
        })->where('oeuvrestored.id', '<=', '3')->select('*','animejeu.id as fiche_id')->get();
        return view("firstcontroller.propositionjeu",["jeux"=>$jeux]);
    }
    public function propositionanime(){
        $animes = fiche::join('oeuvrestored', function($join)
        {
            $join->on('animejeu.id', '=', 'oeuvrestored.idoeuvre');
        })->wherebetween('oeuvrestored.id', ['4', '6'])->select('*','animejeu.id as fiche_id')->get();
        return view("firstcontroller.propositionanime",["animes"=>$animes]);
    }
    public function propositioncinema(){
        $cinemas = fiche::join('oeuvrestored', function($join)
        {
            $join->on('animejeu.id', '=', 'oeuvrestored.idoeuvre');
        })->wherebetween('oeuvrestored.id', ['7', '9'])->select('*','animejeu.id as fiche_id')->get();
        return view("firstcontroller.propositioncinema",["cinemas"=>$cinemas]);
    }
}
