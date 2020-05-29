@extends('layouts.app')

@section('content')
    @if(Auth::user()->admin == 1)
    <div class="ls_admin">
        <span class="ls_admin_title">Toutes les fiches d'animé/jeu vidéo</span>
        @foreach($fiches as $fiche)
            <div class="ls_admin_nom_lien {{$fiche->status}}">
                <div class="ls_admin_nom success_nom">{{$fiche->nom}}</div>
                @if($fiche->status == "a confirmer")
                    <a href="/fiche/confirmer/{{$fiche->id}}">Confirmer</a>
                @endif
                <a href="/fiche/edit/{{$fiche->id}}">modifier</a>
                <a href="/fiche/destroy/{{$fiche->id}}">supp</a><br/>
            </div>
        @endforeach
    </div>
    @else
        vous n'êtes pas autorisé à venir ici
    @endif
@endsection
