<?php

namespace App\Http\Controllers;

use App\lienami;
use Illuminate\Http\Request;
use Auth;

class amicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $lienamis = lienami::join('users', function($join)
        {
            $join->on('users.id', '=', 'lienami.idami1')->orOn('users.id', '=', 'lienami.idami2');
        })->where('users.id', '!=', auth::id())->distinct()->get();
        return view("amicontroller.viewall",["lienamis"=>$lienamis,"user"=>$user]);
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
        $newlien = new lienami();
        $newlien->idami1 = auth::id();
        $newlien->idami2 = $request->input('idami');
        $newlien->status = "en attente";
        $newlien->save();
        return redirect()->to('/profil/'.$request->input('idami'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $lienami = lienami::where('idami1','=',$request->input('idami1'))->where('idami2','=',$request->input('idami2'))->first();
        $lienami->status = $request->input('value');
        $lienami->save();
        return redirect('/profil/allami');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $lienami = lienami::where('idami1','=',$request->input('idami1'))->where('idami2','=',$request->input('idami2'))->first()->delete();
        return redirect('/profil/allami');
    }
}

