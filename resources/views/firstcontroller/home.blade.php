@extends('layouts.app')

@section('content')
        <form method="get" action="/search">
            <input type="search" id="searchbar" name="search" placeholder="Recherchez une oeuvre">
            <button id="searchbar-button"><img src="/img/search.png"></button>
        </form>
        <div class="card-discovery" style="background-image: url('/img/jak_3.jpg');">
            <div class="text">
                <h3>Une nouvelle sélection de jeux vidéo pour vous !</h3>
                <a href="#">Consulter maintenant</a>
            </div>
        </div>
        <div class="card-discovery" style="background-image: url('/img/il-etait-une-fois-la-vie-dvd.jpg');">
            <div class="text">
                <h3>Une nouvelle sélection d'animés pour vous !</h3>
                <a href="#">Consulter maintenant</a>
            </div>
        </div>
        <div id="section-defi">
            <h3>Défis généraux ! <span class="time">Encore 21j pour les compléter</span></h3>
            <div class="card-defi">
                <img src="/img/elder-srolls-skyrim-trophees-succes-016.png">
                <div class="text">
                    <span class="intitule">Tuez 50 trucmuches</span><br>
                    <div class="soustext">
                        <span class="points">25 points !</span>
                        <span class="objectif">A faire</span>
                    </div>
                </div>
            </div>
            <div class="card-defi">
                <img src="/img/elder-srolls-skyrim-trophees-succes-016.png">
                <div class="text">
                    <span class="intitule">Tuez 50 trucmuches</span><br>
                    <div class="soustext">
                        <span class="points">25 points !</span>
                        <span class="objectif">A faire</span>
                    </div>
                </div>
            </div>
            <div class="card-defi">
                <img src="/img/elder-srolls-skyrim-trophees-succes-016.png">
                <div class="text">
                    <span class="intitule">Tuez 50 trucmuches</span><br>
                    <div class="soustext">
                        <span class="points">25 points !</span>
                        <span class="objectif">A faire</span>
                    </div>
                </div>
            </div>
        </div>
@endsection
