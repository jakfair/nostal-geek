@extends('layouts.app')

@section('content')
    @foreach($jeux as $jeu)
        <div class="card-discovery" style="background-image: url('{{$jeu->banniere}}');">
            <div class="text">
                <h3>{{$jeu->nom}}</h3>
                <a href="/fiche/{{$jeu->fiche_id}}">Découvrir !</a>
            </div>
        </div>
    @endforeach
@endsection
