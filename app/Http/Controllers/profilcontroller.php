<?php

namespace App\Http\Controllers;

use App\lienami;
use App\lienoeuvre;
use App\fiche;
use Illuminate\Http\Request;
use App\profil;
use Auth;

class profilcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profils = profil::all();
        return view("profilcontroller.viewall",["profils"=>$profils]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profil = profil::findOrFail($id);
        $user = Auth::user();
        $lienami = lienami::where(function ($query) use($profil) {
            $query->where('idami1', Auth::id())->where('idami2', $profil->id)
                ->orWhere('idami1', $profil->id)->where('idami2', Auth::id());
        })->first();
        if (empty($lienami)) {
            $lienami = "none";
        }
        $lienoeuvres = fiche::join('lienoeuvre', 'animejeu.id', '=','lienoeuvre.idfiche')->where('lienoeuvre.iduser','=', $id)->get();
        return view("profilcontroller.show",["profil"=>$profil,"user"=>$user,"lienami"=>$lienami, "lienoeuvres"=>$lienoeuvres]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = profil::findOrFail($id);
        $user = Auth::user();
        return view("profilcontroller.edit",["profil"=>$profil]);
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
        $profil = profil::find($id);
        $profil ->name = $request->input('name');
        $profil ->age = $request->input('age');
        if($request->hasFile('avatar')){
            $name = $request->file('avatar')->hashName();
            $request->file('avatar')->move('upload/',$name);
            $profil->avatar = "/upload/".$name;
        }
        $profil->save();
        $user = Auth::user();
        return redirect()->to('/profil/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=profil::find($id)->delete();
        return redirect('/admin/profils');
    }
}

