@extends('layouts.app')

@section('content')
    Toutes les fiches d'animé/jeu vidéo pour l'administration
    @foreach($fiches as $fiche)
        {{$fiche->nom}}
    @endforeach
@endsection
