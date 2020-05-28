<?php

namespace App\Http\Controllers;

use App\Article;
use App\defi;
use App\fiche;
use App\liendefi;
use App\liensucces;
use App\ressource;
use App\success;
use App\timers;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class firstcontroller extends Controller
{
    public function index(){
        $generals = success::join('successtored', function($join)
        {
            $join->on('succes.id', '=', 'successtored.idsuccess');
        })->select('*','succes.id as succes_id')->get();

        $liengenerals = liensucces::where('iduser','=',auth::id())->first();

        if(empty($liengenerals)){
            foreach ($generals as $general) {
                $liengeneral = new liensucces();
                $liengeneral->iduser = auth::id();
                $liengeneral->idsucces = $general->succes_id;
                $liengeneral->status = "a faire";
                $liengeneral->save();
            }
        }
        $finalgenerals = success::join('liensucces', function($join)
        {
            $join->on('liensucces.idsucces', '=', 'succes.id')->where('liensucces.iduser', '=', auth::id());
        })->select('*','liensucces.status as liensucces_status','liensucces.id as liensucces_id')->get();
        function dateDifference($date_1 , $date_2 , $differenceFormat = '%d Jours et %h heures' )
        {
            $datetime1 = date_create($date_1);
            $datetime2 = date_create($date_2);

            $interval = date_diff($datetime1, $datetime2);

            return $interval->format($differenceFormat);

        }
        $timer = timers::find(1)->timehebdomadaire;
        $diffhebdo = dateDifference($timer,now(2));



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
        return view("firstcontroller.home",["diffhebdo"=>$diffhebdo,"generals"=>$finalgenerals,"propaljeux"=>$propaljeux,"propalanimes"=>$propalanimes,"propalcinemas"=>$propalcinemas]);
    }
    public function confirmsucces(Request $request){
        $user = Auth::user();
        $succes = success::join('liensucces', function($join)
        {
            $join->on('liensucces.idsucces', '=', 'succes.id')->where('liensucces.iduser', '=', auth::id());
        })->where('liensucces.id','=',$request->input('idliensucces'))->first();
        $user->nbpoints = $user->nbpoints + $succes->nbPoint;
        $user->save();
        $res = liensucces::where('id','=',$request->input('idliensucces'))->first();
        $res->status = "Terminé";
        $res->save();
        return redirect()->to('/');
    }
    public function search(Request $request){
        $fiches = fiche::where('nom','LIKE','%'.$request->input('search').'%')->where('status','=','confirme')->orderBy('nom', 'ASC')->get();
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
