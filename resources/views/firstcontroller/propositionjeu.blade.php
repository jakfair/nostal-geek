@extends('layouts.app')

@section('content')
    @foreach($jeux as $jeu)
        <a href="/fiche/{{$jeu->fiche_id}}">
        <div class="card-discovery" style="background-image: url('{{$jeu->banniere}}');">
            <div class="text">
                <h3>{{$jeu->nom}}</h3>
                <span class="petitlien">Découvrir !</span>
            </div>
        </div>
        </a>
    @endforeach
@endsection
