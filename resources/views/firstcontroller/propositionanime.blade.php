@extends('layouts.app')

@section('content')
    @foreach($animes as $anime)
        <a href="/fiche/{{$anime->fiche_id}}">
        <div class="card-discovery" style="background-image: url('{{$anime->banniere}}');">
            <div class="text">
                <h3>{{$anime->nom}}</h3>
                <span class="petitlien">Découvrir !</span>
            </div>
        </div>
        </a>
    @endforeach
@endsection
