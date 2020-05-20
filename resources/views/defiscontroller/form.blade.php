@extends('layouts.app')

@section('content')
    formulaire de création d'utilisateur
    <form method="get" id="formDefis" action="/form/addDefis" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="defis" placeholder="entrer le defis">
        <button type="submit">Envoyer</button>
    </form>

@endsection
