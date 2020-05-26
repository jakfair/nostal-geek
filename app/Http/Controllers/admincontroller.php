<?php

namespace App\Http\Controllers;

use App\defi;
use App\fiche;
use App\lienami;
use App\profil;
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
        $defis = defi::all();
        return view("defiscontroller.viewall",["defis"=>$defis]);
    }

}

