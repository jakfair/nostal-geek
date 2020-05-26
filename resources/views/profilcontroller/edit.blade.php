@extends('layouts.app')

@section('content')
    @auth
        @if($profil->id == \Illuminate\Support\Facades\Auth::id())
        <div class="edit_profil">
            <p>formulaire de création d'utilisateur</p>

            <form method="post" id="formuser" action="/profil/update/{{$profil->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form_profil">
                     <input id="avatar" type="file" name="avatar" style="opacity: 0">
                    <label for="avatar"><img src="{{$profil->avatar}}"></label>
                </div>
                <div>
                    <p>Mot de passe:</p>
                    <p>Nom:</p>
                    <p>Age:</p>
                </div>
                <div>
                    <input type="password" id="pass" name="password"
                               minlength="8" required placeholder="mot de passe" value="">

                    <input type="text" name="name" placeholder="Nom" value="{{$profil->name}}">

                    <input type="text" name="age" placeholder="Age" value="{{$profil->age}}">
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </div>
        @else
            <p>a marche pas</p>
        @endif
    @endauth
@endsection
