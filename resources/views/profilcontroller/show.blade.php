@extends('layouts.app')

@section('content')

    @if($user->id == $profil->id)

    @else
        @if($lienami == "none")
        <form method="post" id="formAmi" action="/profil/addami">
            @csrf
            <input hidden value="{{$profil->id}}" name="idami">
            <button type="submit">Envoyer</button>
        </form>
            @else
                {{$lienami->status}}
            @endif
    @endif
    <div id="info-general">
        <img class="avatar" src="{{$user->avatar}}">
        <div class="infos">
            <h4>{{$user->name}}</h4>
            <span>{{$user->age}} ans</span>
            <p>{{$user->bio}}</p>
            <span>Points: {{$user->nbpoints}}</span><br>
            <a href="/logout" style="color:dimgrey">Se déconnecter</a>
        </div>
    </div>

    <div id="favoris">
        <div id="list">
            <img id="buttonsearch0" class="buttonsearch" src="/img/star.png" onclick="toggleprofil('0')"/>
            <img id="buttonsearch1" class="buttonsearch" src="/img/films.png" onclick="toggleprofil('1')"/>
            <img id="buttonsearch2" class="buttonsearch" src="/img/jeux.png" onclick="toggleprofil('2')"/>
            <img id="buttonsearch3" class="buttonsearch" src="/img/cinemas.png" onclick="toggleprofil('3')"/>
        </div>
        <div id="fond" style="margin-left: 0">
            <div id="list_favoris">
                @foreach($lienoeuvres as $lienoeuvre)
                    <div class="categorie">
                        <a href="/fiche/{{$lienoeuvre->fiche_id}}"><img src="{{$lienoeuvre->icone}}"/></a>
                        <p>{{$lienoeuvre->nom}}</p>
                    </div>
                @endforeach
            </div>

            <div id="list_favoris">
                @foreach($lienoeuvres as $lienoeuvre)
                    @if($lienoeuvre->type == "anime")
                    <div class="categorie">
                        <a href="/fiche/{{$lienoeuvre->fiche_id}}"><img src="{{$lienoeuvre->icone}}"/></a>
                        <p>{{$lienoeuvre->nom}}</p>
                    </div>
                    @endif
                @endforeach
        </div>
            <div id="list_favoris">
                @foreach($lienoeuvres as $lienoeuvre)
                    @if($lienoeuvre->type == "jeu")
                    <div class="categorie">
                        <a href="/fiche/{{$lienoeuvre->fiche_id}}"><img src="{{$lienoeuvre->icone}}"/></a>
                        <p>{{$lienoeuvre->nom}}</p>
                    </div>
                    @endif
                @endforeach
            </div>
            <div id="list_favoris">
                @foreach($lienoeuvres as $lienoeuvre)
                    @if($lienoeuvre->type == "cinema")
                    <div class="categorie">
                        <a href="/fiche/{{$lienoeuvre->fiche_id}}"><img src="{{$lienoeuvre->icone}}"/></a>
                        <p>{{$lienoeuvre->nom}}</p>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
@endsection
