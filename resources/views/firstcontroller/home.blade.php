@extends('layouts.app')

@section('content')
        <form method="get" action="/search">
            <input type="search" id="searchbar" name="search" placeholder="Recherchez une oeuvre">
            <button id="searchbar-button"><img src="/img/search.png"></button>
        </form>
        <a href="propositionjeu/">
        <div class="card-discovery">
            <div class="container-visuel">
                @foreach($propaljeux as $propaljeu)
                    <div style="background-image: url('{{$propaljeu->banniere}}');"> </div>
                    @endforeach
            </div>
            <div class="text">
                <h3>Une nouvelle sélection de jeux vidéo pour vous !</h3>
                <span class="petitlien" href="propositionjeu/">Consulter maintenant</span>
            </div>
        </div>
        </a>
        <a href="propositionanime/">
        <div class="card-discovery">
            <div class="container-visuel">
                @foreach($propalanimes as $propalanime)
                    <div style="background-image: url('{{$propalanime->banniere}}');"> </div>
                @endforeach
            </div>
            <div class="text">
                <h3>Une nouvelle sélection d'animés pour vous !</h3>
                <span class="petitlien">Consulter maintenant</span>
            </div>
        </div>
        </a>
        <a href="propositioncinema/">
        <div class="card-discovery">
            <div class="container-visuel">
                @foreach($propalcinemas as $propalcinema)
                    <div style="background-image: url('{{$propalcinema->banniere}}');"> </div>
                @endforeach
            </div>
            <div class="text">
                <h3>Une nouvelle sélection de séries et de films pour vous !</h3>
                <span class="petitlien">Consulter maintenant</span>
            </div>
        </div>
        </a>
        <div id="section-defi">

            <h3>Défis généraux ! <span class="time">Encore {{$diffhebdo}} pour les compléter</span></h3>
            @foreach($generals as $general)
            <div class="card-defi">
                <div class="text">
                        <div class="intitule">{{$general->intitule}}</div>
                        <div class="soustext">
                            <span class="points">{{$general->nbPoint}} points</span>
                            @if($general->liensucces_status == "a faire")
                                <form method="post" action="/success/confirm">
                                    {{ csrf_field() }}
                                    <input hidden name="idliensucces" value="{{$general->liensucces_id}}">
                                    <input hidden name="idfiche" value="{{$general->id}}">
                                    <button type="submit"><img src="/img/cercle.png"></button>
                                </form>
                            @else
                                <span class="objectif"><img src="/img/check.png"></span>
                            @endif
                    </div>
                </div>
            </div>
            @endforeach
@include('successcontroller.form')
        </div>
@endsection
