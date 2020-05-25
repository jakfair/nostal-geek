@extends('layouts.app')

@section('content')
    <div id="infofiche" style="background-image: url('{{$fiche->banniere}}')">
        <img src="{{$fiche->icone}}">
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
                        <span class="objectif">{{$defi->status}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        @include('defiscontroller.form')
    @endif
@endsection
