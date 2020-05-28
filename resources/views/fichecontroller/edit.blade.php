@extends('layouts.app')

@section('content')
    <div id="titre">formulaire de création de fiche de jeu vidéo/animé</div>
    <form method="post" id="formfiche" action="/fiche/update/{{$fiche->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="bouton">
            <input type="text" name="nom" placeholder="entrez le nom de l'oeuvre" value="{{$fiche->nom}}">
            <textarea name="description" placeholder="entrez la description de l'oeuvre" value="{{$fiche->description}}"></textarea>
            <input type="text" name="annee" placeholder="entrez la description de l'oeuvre" value="{{$fiche->annee}}">
        </div>
        <div id="fiche">
            <div id="type">Type = {{$fiche ->type}}</div>
                <div id="selecte">
                    @if($fiche->type == "jeu")
                    <select name="categorie" id="categorie_jeux">
                        <option value="{{$fiche->categorie}}">{{$fiche->categorie}}</option>
                        <option value="RPG" selected>RPG</option>
                        <option value="FPS">FPS</option>
                        <option value="RTS">RTS</option>
                        <option value="course">Course</option>
                        <option value="plateforme">Plateforme</option>
                        <option value="horreur">Horreur</option>
                        <option value="action">Action</option>
                        <option value="gestion">Gestion</option>
                        <option value="simulateurdevie">Simulateur de vie</option>
                    </select>
                    @elseif($fiche->type == "anime")
                        <select name="categorie" id="categorie_anime">
                            <option value="isekai" selected>Isekai</option>
                            <option value="science-fiction">Science-Fiction</option>
                            <option value="fantasy">Fantasy</option>
                            <option value="comedie" selected>Comédie</option>
                            <option value="action">Action</option>
                            <option value="drame">Drame</option>
                            <option value="jeunesse">Jeunesse</option>
                            <option value="musical">Comédie musicale</option>
                            <option value="aventure">Aventure</option>
                        </select>
                        @else
                        <select name="categorie" id="categorie_cinema">
                            <option value="comedie" selected>Comédie</option>
                            <option value="drame">Drame</option>
                            <option value="horreur">Horreur</option>
                            <option value="fantasy">Fantastique</option>
                            <option value="sitcom">Sitcom</option>
                            <option value="aventure">Aventure</option>
                            <option value="science-fiction">Science-Fiction</option>
                        </select>
                    @endif
                    <img src="{{$fiche ->banniere}}">
                        <input type="file" name="banniere" accept='image/png, image/jpeg'/>
                </div>
                <div id="image">
                    <img src="{{$fiche ->icone}}">
                    <input type="file" name="icone" accept='image/png, image/jpeg'/>
                </div>
                <div id="liens">
                    @if($fiche->type == "jeu")
                    <input type="text" name="lienAchat" placeholder="lien pour acheter" value="{{$fiche->lienAchat}}"/>
                    <input type="text" name="lienEmuler" placeholder="lien pour emuler" value="{{$fiche->lienEmuler}}"/>
                    @else
                    <input type="text" name="lienVoir" placeholder="lien pour regarder" value="{{$fiche->lienVoir}}"/>
                    @endif
                </div>
                <div id="envoyer">
                    <button type="submit" name="status" value="confirme">Confirmer la fiche</button>
                </div>
        </div>
    </form>
@endsection
