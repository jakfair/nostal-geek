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
                <h3>Une nouvelle sélection de séries et de films pour vous !</h3>
                <a href="propositioncinema/">Consulter maintenant</a>
            </div>
        </div>
        <div id="section-defi">

            <h3>Défis généraux ! <span class="time">Encore 21j pour les compléter</span></h3>
            @foreach($generals as $general)
            <div class="card-defi">
                <div class="text">
                        <span class="intitule">{{$general->intitule}}</span><br>
                        <div class="soustext">
                            <span class="points">{{$general->nbPoint}} points</span>
                            @if($general->liensucces_status == "a faire")
                                <form method="post" action="/success/confirm">
                                    {{ csrf_field() }}
                                    <input hidden name="idliensucces" value="{{$general->liensucces_id}}">
                                    <input hidden name="idfiche" value="{{$general->id}}">
                                    <button type="submit">Appuyer ici pour confirmer</button>
                                </form>
                            @else
                                <span class="objectif">{{$general->liensucces_status}}</span>
                            @endif
                    </div>
                </div>
            </div>
            @endforeach
@include('successcontroller.form')
        </div>
@endsection
