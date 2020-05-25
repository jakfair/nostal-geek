@extends('layouts.app')

@section('content')
    <form method="get" action="/search">
        <input type="search" id="searchbar" name="search" placeholder="Recherchez une oeuvre">
        <button id="searchbar-button"><img src="/img/search.png"></button>
    </form>
    <h1 style="margin-bottom: 25px;">Les oeuvres de votre vie</h1>
    <a id="linkformfiche" href="/form/fiche">Vous ne trouvez pas votre oeuvre favorite ? Ajoutez la !</a>
    <div id="container-buttonsearch">
        <div id="buttonsearch0" class="buttonsearch" onclick="togglesearch('0')"><img src="/img/tv2.png"></div>
        <div id="buttonsearch1" class="buttonsearch" onclick="togglesearch('1')"><img src="/img/manette.png"></div>
        <div id="buttonsearch2" class="buttonsearch" onclick="togglesearch('2')"><img src="/img/camera.png"></div>
    </div>
    <div id="container-categorie" style="margin-left: 0vw;">
        <div id="anime">
            @foreach($fiches as $fiche)
                @if($fiche->type == "anime")
                    <a href="/fiche/{{$fiche->id}}" class="fichesearch">
                        <div class="illu" style="background-image: url('{{$fiche->icone}}')"></div>
                        <div class="info">
                            <h4>{{$fiche->nom}}</h4>
                            <span>{{$fiche->categorie}}</span>
                            <p>{{$fiche->description}}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div id="jeuvideo">
            @foreach($fiches as $fiche)
                @if($fiche->type == "jeu")
                    <a href="/fiche/{{$fiche->id}}" class="fichesearch">
                        <div class="illu" style="background-image: url('{{$fiche->icone}}')"></div>
                        <div class="info">
                            <h4>{{$fiche->nom}}</h4>
                            <span>{{$fiche->categorie}}</span>
                            <p>{{$fiche->description}}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div id="cinema">
            @foreach($fiches as $fiche)
                @if($fiche->type == "cinema")
                    <a href="/fiche/{{$fiche->id}}" class="fichesearch">
                        <div class="illu" style="background-image: url('{{$fiche->icone}}')"></div>
                        <div class="info">
                            <h4>{{$fiche->nom}}</h4>
                            <span>{{$fiche->categorie}}</span>
                            <p>{{$fiche->description}}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection
