@extends('layouts.app')

@section('content')
@foreach($lienoeuvres as $lienoeuvre)
    {{$lienoeuvre->nom}}
@endforeach
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
    <div id="top">
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

    </div>
    <div id="favoris">
        <div id="list">
            <img id="fav" src="/img/star.png"/>
            <img src="/img/amis.png"/>
            <img src="/img/films.png"/>
            <img src="/img/jeux.png"/>
        </div>
        <div id="fond">
            <div id="list_favoris">
                <div class="categorie">
                    <img src="/img/winx.png"/>
                    <p>Les Winx</p>
                </div>
                <div class="categorie">
                    <img src="/img/buffy.png"/>
                    <p>Buffy contre les vampires</p>
                </div>
                <div class="categorie">
                <img src="/img/ff10.png"/>
                    <p>Final Fantasy 10</p>
                </div>
                <div class="categorie">
                    <img src="/img/winx.png"/>
                    <p>Les Winx</p>
                </div>
                <div class="categorie">
                    <img src="/img/buffy.png"/>
                    <p>Buffy contre les vampires</p>
                </div>
                <div class="categorie">
                    <img src="/img/ff10.png"/>
                    <p>Final Fantasy 10</p>
                </div>
                <div class="categorie">
                    <img src="/img/winx.png"/>
                    <p>Les Winx</p>
                </div>
                <div class="categorie">
                    <img src="/img/buffy.png"/>
                    <p>Buffy contre les vampires</p>
                </div>
                <div class="categorie">
                    <img src="/img/ff10.png"/>
                    <p>Final Fantasy 10</p>
                </div>
            </div>
            <div id="next">
                <button type="button"><img src="/img/previous.png"/></button>
                <button type="button"><img src="/img/next.png"/></button>
            </div>
        </div>

    </div>
@endsection
