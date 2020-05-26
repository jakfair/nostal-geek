@extends('layouts.app')

@section('content')
        <form method="get" action="/search">
            <input type="search" id="searchbar" name="search" placeholder="Recherchez une oeuvre">
            <button id="searchbar-button"><img src="/img/search.png"></button>
        </form>
        <div class="card-discovery">
            <div class="container-visuel">
                @foreach($propaljeux as $propaljeu)
                    <div style="background-image: url('{{$propaljeu->banniere}}');"> </div>
                    @endforeach
            </div>
            <div class="text">
                <h3>Une nouvelle sélection de jeux vidéo pour vous !</h3>
                <a href="propositionjeu/">Consulter maintenant</a>
            </div>
        </div>
        <div class="card-discovery">
            <div class="container-visuel">
                @foreach($propalanimes as $propalanime)
                    <div style="background-image: url('{{$propalanime->banniere}}');"> </div>
                @endforeach
            </div>
            <div class="text">
                <h3>Une nouvelle sélection d'animés pour vous !</h3>
                <a href="propositionanime/">Consulter maintenant</a>
            </div>
        </div>
        <div class="card-discovery">
            <div class="container-visuel">
                @foreach($propalcinemas as $propalcinema)
                    <div style="background-image: url('{{$propalcinema->banniere}}');"> </div>
                @endforeach
            </div>
            <div class="text">
                <h3>Une nouvelle sélection de série et dfe film pour vous !</h3>
                <a href="propositioncinema/">Consulter maintenant</a>
            </div>
        </div>
        <div id="section-defi">

            <h3>Défis généraux ! <span class="time">Encore 21j pour les compléter</span></h3>
            @foreach($general as $generals)
            <div class="card-defi">
                <img src="/img/elder-srolls-skyrim-trophees-succes-016.png">
                <div class="text">

                        <span class="intitule">{{$generals->intitule}}</span><br>
                        <div class="soustext">
                            <span class="points">{{$generals->nbPoint}} points</span>
                            <span class="objectif">{{$generals->status}}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
@endsection
