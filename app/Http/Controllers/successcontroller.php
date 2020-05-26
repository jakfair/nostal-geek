<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\success;
use App\fiche;

class successcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $success = success::all();
        return view("successscontroller.viewall",["success"=>$success,"general"=>$general]);
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
        $success = new success();
        $success->intitule = $request->input('intitule');
        $success->type = $request->input('type');
        $success->status = "a confirmer";
        $success->nbPoint = $request->input('points');

        $success->save();
        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $success = success::findOrFail($id);
        return view("successscontroller.show",["success"=>$success]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $success = success::findOrFail($id);
        return view("successcontroller.edit",["success"=>$success]);
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

        $success = success::find($id);
        $success->intitule = $request->input('intitule');
        $success->type = $request->input('type');
        $success->status = $request->input('status');;
        $success->nbPoint = $request->input('points');
        $success->save();
        return redirect()->to('/admin/success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=success::find($id)->delete();
        return redirect('/admin/success');
    }
}

