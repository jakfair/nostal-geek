<?php

namespace App\Http\Controllers;

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
        //
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
        $fiche->categorie = $request->input('categorie');
        $fiche->type = $request->input('type');
        $fiche->status = "a confirmer";
        $lien = "";
        if(!empty($request->input('lienAchat'))){
            $lien = $lien."<a href='".$request->input('lienAchat')."'>acheter</a>";
        }
        if(!empty($request->input('lienEmuler'))){
            $lien = $lien."<a href='".$request->input('lienEmuler')."'>Emuler</a>";
        }
        if(!empty($request->input('lienVoir'))){
            $lien = $lien."<a href='".$request->input('lienVoir')."'>Voir</a>";
        }
        $fiche->lien = $lien;
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
        return view("fichecontroller.show",["fiche"=>$fiche]);
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
        $fiche->fill($request->except('banner'));
        $fiche->titre = $request->input('titre');
        $fiche->soustitre = $request->input('soustitre');
        $fiche->date = $request->input('date');
        $fiche->auteur = $request->input('auteur');
        $fiche->categorie = $request->input('categorie');
        $fiche->contenu = $request->input('contenu');
        if($request->hasFile('banner')){
            $name = $request->file('banner')->hashName();
            $folder_name = str_replace(' ','_',$request->input('categorie'));
            $request->file('banner')->move('upload/'.$folder_name,$name);
            $fiche->banner = "/upload/".$folder_name."/".$name;
        }
        $fiche->save();
        return redirect('/admin/fiches');
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

