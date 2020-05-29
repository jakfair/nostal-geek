<?php

namespace App\Http\Controllers;

use App\liendefi;
use Illuminate\Http\Request;
use App\defi;
use App\fiche;
use Illuminate\Support\Facades\Auth;

class deficontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $defi = defi::all();
        $general = defi::where('defis.idJeu','=', '0')->inRandomOrder()->limit(3)->get();
        return view("defiscontroller.viewall",["defi"=>$defi,"general"=>$general]);
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
        return view("defiscontroller.show",["defi"=>$defi]);
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
        $defi->intitule = $request->input('intitule');
        $defi->categorie = $request->input('categorie');
        $defi->status = $request->input('status');;
        $defi->nbPoint = $request->input('points');
        if($request->hasFile('icone')){
            $name1 = $request->file('icone')->hashName();
            $request->file('icone')->move('upload/',$name1);
            $defi->icone = "/upload/".$name1;
        }

        $defi->save();
        return redirect()->to('/fiche/'.$defi->idJeu);
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
    public function confirm(Request $request){
        $user = Auth::user();
        $defi = defi::join('liendefi', function($join)
        {
            $join->on('liendefi.iddefi', '=', 'defis.id')->where('liendefi.iduser', '=', auth::id());
        })->where('liendefi.id','=',$request->input('idliendefi'))->first();
        $user->nbpoints = $user->nbpoints + $defi->nbPoint;
        $user->save();
        $res=liendefi::where('id','=',$request->input('idliendefi'))->first();
        $res->status = "Terminé";
        $res->save();
        return redirect()->to('/fiche/'.$request->input('idfiche'));
    }
    public function confirmdefi($id){
        $defi = defi::find($id);
        $defi->status = "confirme";
        $defi->save();
        return redirect('/admin/defis');
    }
}

