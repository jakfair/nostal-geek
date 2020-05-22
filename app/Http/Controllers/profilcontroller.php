<?php

namespace App\Http\Controllers;

use App\lienami;
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
        return view("profilcontroller.show",["profil"=>$profil,"user"=>$user,"lienami"=>$lienami]);
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
        $profil ->email = $request->input('email');
        $profil ->password = $request->input('password');
        $profil ->name = $request->input('name');
        $profil ->age = $request->input('age');
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

    }
    public function addami(Request $request)
    {
        $newlien = new lienami();
        $newlien->idami1 = auth::id();
        $newlien->idami2 = $request->input('idami');
        $newlien->status = "en attente";
        $newlien->save();
        return redirect()->to('/profil/'.$request->input('idami'));
    }
}

