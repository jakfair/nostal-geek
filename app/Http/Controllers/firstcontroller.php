<?php

namespace App\Http\Controllers;

use App\Article;
use App\ressource;
use Illuminate\Http\Request;

class firstcontroller extends Controller
{
    public function index(){
        return view("firstcontroller.home");
    } // cette fonction prend 3 articles (id : 1, 2 et 3) pour l'affichage sur la home ?
}
