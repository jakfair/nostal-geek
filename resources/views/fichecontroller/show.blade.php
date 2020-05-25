@extends('layouts.app')

@section('content')
    Vu d'une page d'animé/jeu vidéo
    {{$fiche -> nom}}
    {!!$fiche -> lien!!}
    @if($fiche -> type == "jeu")
    @include('defiscontroller.form')
    @endif
    <div id="infofiche" style="background-image: url('{{$fiche->banniere}}')">
        <img src="{{$fiche->icone}}">
        <h4>{{$fiche->nom}}</h4>
        <span>{{$fiche->categorie}}</span>
        @if($fiche -> type == "jeu")
            <a href="{{$fiche->LienAchat}}">achat</a>
            <a href="{{$fiche->LienEmuler}}">émuler</a>
            @else
            <a href="{{$fiche->LienVoir}}">voir</a>
        @endif
    </div>
@endsection
