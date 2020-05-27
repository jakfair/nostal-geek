@extends('layouts.app')

@section('content')
    <div id="infofiche" style="background-image: url('{{$fiche->banniere}}')">
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
        <span>{{$fiche->categorie}}</span>
        <div>
        @if($fiche -> type == "jeu")
            <a href="{!!$fiche->lienAchat!!}" target="_blank" ><img src="/img/buy.png"></a>
            <a href="{!!$fiche->lienEmuler!!}"target="_blank" ><img src="/img/emulate.png"></a>
            @else
            <a href="{!!$fiche->lienVoir!!}"target="_blank" ><img src="/img/see.png"></a>
        @endif
        </div>
    </div>
    @if($fiche -> type == "jeu")
        @foreach($defis as $defi)
            <div class="card-defi">
                <img src="{{$defi->icone}}">
                <div class="text">

                    <span class="intitule">{{$defi->intitule}}</span><br>
                    <div class="soustext">
                        <span class="points">{{$defi->nbPoint}} points</span>
                        @if($defi->liendefi_status == "a faire")
                            <form method="post" action="/defi/confirm">
                                {{ csrf_field() }}
                                <input hidden name="idliendefi" value="{{$defi->liendefi_id}}">
                                <input hidden name="idfiche" value="{{$fiche->id}}">
                                <button type="submit">Appuyer ici pour confirmer</button>
                            </form>
                        @else
                            <span class="objectif">{{$defi->liendefi_status}}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        @include('defiscontroller.form')
    @endif
@endsection
