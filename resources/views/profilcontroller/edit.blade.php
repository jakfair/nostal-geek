@extends('layouts.app')

@section('content')
    @auth
        @if($profil->id == \Illuminate\Support\Facades\Auth::id())

    formulaire de création d'utilisateur
    <form method="post" id="formuser" action="/profil/update/{{$profil->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="email" name="email" placeholder="adresse mail" value="{{$profil->email}}" >
        <input type="password" id="pass" name="password"
           minlength="8" required placeholder="mot de passe" value="{{$profil->password}}">
        <input type="text" name="name" placeholder="Nom" value="{{$profil->name}}">
        <input type="text" name="age" placeholder="Age" value="{{$profil->age}}">
        <button type="submit">Envoyer</button>
    </form>
        @else
            <p>a marche pas</p>
        @endif
    @endauth
@endsection
