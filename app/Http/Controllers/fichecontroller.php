<?php

namespace App\Http\Controllers;

use App\defi;
use App\lienoeuvre;
use Illuminate\Http\Request;
use App\fiche;

class fichecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiches = fiche::all();
        return view("fichecontroller.viewall",["fiches"=>$fiches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("fichecontroller.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->file('banniere')->hashName();
        $name2 = $request->file('icone')->hashName();
        $request->file('banniere')->move('upload/',$name);
        $request->file('icone')->move('upload/',$name2);

        $fiche = new fiche();
        $fiche->nom = $request->input('nom');
        $fiche->description = $request->input('description');
        $fiche->banniere = "/upload/".$name;
        $fiche->icone = "/upload/".$name2;
        if($request->input('type') == "jeu"){
            $fiche->categorie = $request->input('categorie_jeu');
            $fiche->lienAchat = $request->input('lienAchat');
            $fiche->lienEmuler = $request->input('lienEmuler');
        }
        if($request->input('type') == "anime"){
            $fiche->categorie = $request->input('categorie_anime');
            $fiche->lienVoir = $request->input('lienVoiranime');
        }
        if($request->input('type') == "cinema"){
            $fiche->categorie = $request->input('categorie_cinema');
            $fiche->lienVoir = $request->input('lienVoircinema');
        }
        $fiche->type = $request->input('type');
        $fiche->status = "a confirmer";
        $fiche->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fiche = fiche::findOrFail($id);
        $defis = defi::where('defis.idJeu','=', $fiche->id)->inRandomOrder()->limit(5)->get();
        return view("fichecontroller.show",["fiche"=>$fiche,"defis"=>$defis]);
    }
    public function addfavoris(Request $request)
    {
        $lienoeuvre= new lienoeuvre();
        $lienoeuvre->iduser= $request->input('userid');
        $lienoeuvre->idfiche= $request->input('ficheid');
        $lienoeuvre->save();
        return redirect(('/fiche/'.$request->input('ficheid')));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fiche = fiche::findOrFail($id);
        return view("fichecontroller.edit",["fiche"=>$fiche]);
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
        $fiche = fiche::find($id);
        $fiche->fill($request->except('banniere','icone'));
        $fiche->nom = $request->input('nom');
        $fiche->description = $request->input('description');
        $fiche->categorie = $request->input('categorie');
        $fiche->type = $request->input('type');
        $fiche->status = $request->input('status');
        if(!empty($request->input('lienAchat'))){
            $fiche->lienAchat = $request->input('lienAchat');
        }
        if(!empty($request->input('lienEmuler'))){
            $fiche->lienEmuler = $request->input('lienEmuler');
        }
        if(!empty($request->input('lienVoir'))){
            $fiche->lienVoir = $request->input('lienVoir');
        }

        if($request->hasFile('banniere')){
            $name = $request->file('banniere')->hashName();
            $request->file('banniere')->move('upload/',$name);
            $fiche->banniere = "/upload/".$name;
        }
        if($request->hasFile('icone')){
            $name1 = $request->file('icone')->hashName();
            $request->file('icone')->move('upload/',$name1);
            $fiche->icone = "/upload/".$name1;
        }

        $fiche->save();
        return redirect()->to('/fiche/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=fiche::find($id)->delete();
        return redirect('/admin/fiches');
    }
}

