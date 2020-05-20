@extends('layouts.app')

@section('content')
    formulaire de création d'utilisateur
    <form method="get" id="formuser" action="/form/" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="email" name="mail" placeholder="adresse mail" valur={{$>
        <input type="password" id="pass" name="password"
           minlength="8" required placeholder="mot de passe">
        <input type="text" name="nom_user" placeholder="Nom">
        <input type="text" name="age" placeholder="Age">
        <button type="submit">Envoyer</button>
    </form>
@endsection
