<?php

namespace App\Http\Controllers;

use App\defi;
use App\fiche;
use App\lienami;
use App\profil;
use App\success;
use Illuminate\Http\Request;
use Auth;

class admincontroller extends Controller
{

    public function fiche()
    {
        $fiches = fiche::all();
        return view("fichecontroller.viewall",["fiches"=>$fiches]);
    }

    public function profil()
    {
        $profils = profil::all();
        return view("profilcontroller.viewall",["profils"=>$profils]);
    }
    public function defi()
    {
        $defis = defi::join('animejeu', function($join)
        {
            $join->on('defis.idJeu', '=', 'animejeu.id');
        })->orderBy('defis.status')->orderBy('animejeu.nom')->select('*','defis.id as defis_id','defis.status as defis_status')->get();
        return view("defiscontroller.viewall",["defis"=>$defis]);
    }
    public function succes()
    {
        $success = success::orderBy('succes.status')->get();
        return view("successcontroller.viewall",["success"=>$success]);
    }

}

