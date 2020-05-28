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
            <span>Niveau: {{$user->nbpoints}}</span>
        </div>
    </div>
    <!--<div id="top">
        <h2>Ses top 1:</h2>
        <div id="soustop">
            <div id="topjeu">
                <h3>Jeux vidéo</h3>
                <a href="#"><img src="/img/jak_3.jpg"></a>
            </div>
            <div id="topanime">
                <h3>Dessin animé</h3>
                <a href="#"><img src="/img/il-etait-une-fois-la-vie-dvd.jpg"></a>
            </div>
        </div>

    </div>-->
    <div id="favoris">
        <div id="list">
            <img id="fav" src="/img/star.png" onclick="toggleprofil('0')"/>
            <img id="dessins" src="/img/amis.png" onclick="toggleprofil('1')"/>
            <img id="movie" src="/img/films.png" onclick="toggleprofil('2')"/>
            <img id="game" src="/img/jeux.png" onclick="toggleprofil('3')"/>
        </div>
        <div id="fond" style="margin-left: 0">
            <div id="list_favoris">
                @foreach($lienoeuvres as $lienoeuvre)
                <div class="categorie">

                        <img src="{{$lienoeuvre->icone}}"/>
                        <p>{{$lienoeuvre->nom}}</p>
                </div>
                @endforeach
            </div>

            <div id="list_favoris">
                <div class="categorie">
                    <img src="/img/smurfs.png"/>
                    <p>Les schtroumpfs</p>
                </div>
                <div class="categorie">
                    <img src="/img/witch.png"/>
                    <p>Witch</p>
                </div>
                <div class="categorie">
                    <img src="/img/kilari.png"/>
                    <p>Kilari</p>
                </div>
                <div class="categorie">
                    <img src="/img/smurfs.png"/>
                    <p>Les schtroumpfs</p>
                </div>
                <div class="categorie">
                    <img src="/img/witch.png"/>
                    <p>Witch</p>
                </div>
                <div class="categorie">
                    <img src="/img/kilari.png"/>
                    <p>Kilari</p>
                </div>
                <div class="categorie">
                    <img src="/img/smurfs.png"/>
                    <p>Les schtroumpfs</p>
                </div>
                <div class="categorie">
                    <img src="/img/witch.png"/>
                    <p>Witch</p>
                </div>
                <div class="categorie">
                    <img src="/img/kilari.png"/>
                    <p>Kilari</p>
                </div>
        </div>
            <div id="list_favoris">
                <div class="categorie">
                    <img src="/img/avatar.png"/>
                    <p>Avatar</p>
                </div>
                <div class="categorie">
                    <img src="/img/charmed.png"/>
                    <p>Charmed</p>
                </div>
                <div class="categorie">
                    <img src="/img/friends.png"/>
                    <p>Friends</p>
                </div>
                <div class="categorie">
                    <img src="/img/avatar.png"/>
                    <p>Avatar</p>
                </div>
                <div class="categorie">
                    <img src="/img/charmed.png"/>
                    <p>Charmed</p>
                </div>
                <div class="categorie">
                    <img src="/img/friends.png"/>
                    <p>Friends</p>
                </div>
                <div class="categorie">
                    <img src="/img/avatar.png"/>
                    <p>Avatar</p>
                </div>
                <div class="categorie">
                    <img src="/img/charmed.png"/>
                    <p>Charmed</p>
                </div>
                <div class="categorie">
                    <img src="/img/friends.png"/>
                    <p>Friends</p>
                </div>
            </div>
            <div id="list_favoris">
                <div class="categorie">
                    <img src="/img/sims.png"/>
                    <p>Les Sims</p>
                </div>
                <div class="categorie">
                    <img src="/img/jack.png"/>
                    <p>Jack et Da</p>
                </div>
                <div class="categorie">
                    <img src="/img/wow.png"/>
                    <p>World of Warcraft</p>
                </div>
                <div class="categorie">
                    <img src="/img/sims.png"/>
                    <p>Les Sims</p>
                </div>
                <div class="categorie">
                    <img src="/img/jack.png"/>
                    <p>Jack et Da</p>
                </div>
                <div class="categorie">
                    <img src="/img/wow.png"/>
                    <p>World of Warcraft</p>
                </div>
                <div class="categorie">
                    <img src="/img/sims.png"/>
                    <p>Les Sims</p>
                </div>
                <div class="categorie">
                    <img src="/img/jack.png"/>
                    <p>Jack et Da</p>
                </div>
                <div class="categorie">
                    <img src="/img/wow.png"/>
                    <p>World of Warcraft</p>
                </div>
            </div>
        </div>

    </div>
@endsection
