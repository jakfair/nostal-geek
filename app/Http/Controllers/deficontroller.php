<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\defi;
use App\fiche;

class deficontroller extends Controller
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
        $name2 = $request->file('icone')->hashName();
        $request->file('icone')->move('upload/',$name2);

        $defi = new defi();
        $defi->intitule = $request->input('intitule');
        $defi->icone = "/upload/".$name2;
        $defi->categorie = $request->input('categorie');
        $defi->status = "a confirmer";
        $defi->nbPoint = $request->input('points');
        $defi->idJeu = $request->input('idjeu');

        $defi->save();
        return redirect()->to('/fiche/'.$request->input('idjeu'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $defi = defi::findOrFail($id);
        return view("deficontroller.show",["defi"=>$defi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $defis = defi::findOrFail($id);
        $fiche = fiche::findOrFail($defis->idJeu);
        return view("defiscontroller.edit",["defis"=>$defis,"fiche"=>$fiche]);
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
        $defi = defi::find($id);
        $defi->fill($request->except('banniere','icone'));
        $defi->nom = $request->input('nom');
        $defi->description = $request->input('description');
        $defi->categorie = $request->input('categorie');
        $defi->type = $request->input('type');
        $defi->status = $request->input('status');
        if(!empty($request->input('lienAchat'))){
            $defi->lienAchat = $request->input('lienAchat');
        }
        if(!empty($request->input('lienEmuler'))){
            $defi->lienEmuler = $request->input('lienEmuler');
        }
        if(!empty($request->input('lienVoir'))){
            $defi->lienVoir = $request->input('lienVoir');
        }

        if($request->hasFile('banniere')){
            $name = $request->file('banniere')->hashName();
            $request->file('banniere')->move('upload/',$name);
            $defi->banniere = "/upload/".$name;
        }
        if($request->hasFile('icone')){
            $name1 = $request->file('icone')->hashName();
            $request->file('icone')->move('upload/',$name1);
            $defi->icone = "/upload/".$name1;
        }

        $defi->save();
        return redirect()->to('/defi/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=defi::find($id)->delete();
        return redirect('/admin/defis');
    }
}

