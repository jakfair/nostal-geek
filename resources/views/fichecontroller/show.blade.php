@extends('layouts.app')

@section('content')
    <div id="infofiche" style="background-image: url('{{$fiche->banniere}}')">
        <div id="filter">  </div>
        <img src="{{$fiche->icone}}">
        <form id="formfavori" method="post" action="/fiche/addfavoris">
            {{ csrf_field() }}

            <input type="text" value="{{Auth::user()->id}}" hidden name="userid">
            <input type="text" value="{{$fiche->id}}" hidden name="ficheid">
            @if($favori == "non")
                <button type="submit"><img src="/img/star_alt.png"></button>
            @else
                <a href="/fiche/destroyfavori/{{$favori->id}}"><img src="/img/star.png"></a>
            @endif
        </form>
        <h4>{{$fiche->nom}}</h4>
        <span>{{$fiche->categorie}}</span><span id="annee">{{$fiche->annee}}</span>
        <div>
        @if($fiche -> type == "jeu")
            <a href="{!!$fiche->lienAchat!!}" target="_blank" ><img src="/img/buy.png"></a>
            <a href="{!!$fiche->lienEmuler!!}"target="_blank" ><img src="/img/emulate.png"></a>
            @else
            <a href="{!!$fiche->lienVoir!!}"target="_blank" ><img src="/img/see.png"></a>
        @endif
        </div>
    </div>
    <p id="description">{{$fiche->description}}</p>
    @if($fiche -> type == "jeu")
        <h3 class="titredefifiche">Défis quotidien ! <span class="time">Encore {{$diffquo}} pour les compléter</span></h3>
        @foreach($defis as $defi)
            @if($defi->categorie == "quotidien")
            <div class="card-defi {{$defi->categorie}}">
                <img src="{{$defi->icone}}">
                <div class="text">

                    <div class="intitule">{{$defi->intitule}}</div>
                    <div class="soustext">
                        <span class="points">{{$defi->nbPoint}} points</span>
                        @if($defi->liendefi_status == "a faire")
                            <form method="post" action="/defi/confirm">
                                {{ csrf_field() }}
                                <input hidden name="idliendefi" value="{{$defi->liendefi_id}}">
                                <input hidden name="idfiche" value="{{$fiche->id}}">
                                <button type="submit"><img src="/img/cercle.png"></button>
                            </form>
                        @else
                            <span class="objectif"><img src="/img/check.png"></span>
                        @endif
                    </div>
                </div>
            </div>
                @endif
            @endforeach
        <h3 class="titredefifiche">Défis hebdomadaires ! <span class="time">Encore {{$diffhebdo}} pour les compléter</span></h3>
        @foreach($defis as $defi)
            @if($defi->categorie == "hebdomadaire")
                <div class="card-defi {{$defi->categorie}}">
                    <img src="{{$defi->icone}}">
                    <div class="text">

                        <div class="intitule">{{$defi->intitule}}</div>
                        <div class="soustext">
                            <span class="points">{{$defi->nbPoint}} points</span>
                            @if($defi->liendefi_status == "a faire")
                                <form method="post" action="/defi/confirm">
                                    {{ csrf_field() }}
                                    <input hidden name="idliendefi" value="{{$defi->liendefi_id}}">
                                    <input hidden name="idfiche" value="{{$fiche->id}}">
                                    <button type="submit"><img src="/img/cercle.png"></button>
                                </form>
                            @else
                                <span class="objectif"><img src="/img/check.png"></span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <h3 class="titredefifiche">Défis mensuels ! <span class="time">Encore {{$diffmensuel}} pour les compléter</span></h3>
        @foreach($defis as $defi)
            @if($defi->categorie == "mensuel")
                <div class="card-defi {{$defi->categorie}}">
                    <img src="{{$defi->icone}}">
                    <div class="text">

                        <div class="intitule">{{$defi->intitule}}</div>
                        <div class="soustext">
                            <span class="points">{{$defi->nbPoint}} points</span>
                            @if($defi->liendefi_status == "a faire")
                                <form method="post" action="/defi/confirm">
                                    {{ csrf_field() }}
                                    <input hidden name="idliendefi" value="{{$defi->liendefi_id}}">
                                    <input hidden name="idfiche" value="{{$fiche->id}}">
                                    <button type="submit"><img src="/img/cercle.png"></button>
                                </form>
                            @else
                                <span class="objectif"><img src="/img/check.png"></span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @include('defiscontroller.form')
    @endif
@endsection
