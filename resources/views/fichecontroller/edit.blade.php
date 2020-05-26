@extends('layouts.app')

@section('content')
    <div id="titre">formulaire de création de fiche de jeu vidéo/animé</div>
    <form method="post" id="formfiche" action="/fiche/update/{{$fiche->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="bouton">
            <input type="text" name="nom" placeholder="entrez le nom de l'oeuvre" value="{{$fiche->nom}}">
            <input type="text" name="description" placeholder="entrez la description de l'oeuvre" value="{{$fiche->description}}">
        </div>
        <div id="fiche">
            <div id="type">Type = {{$fiche ->type}}</div>
                <div id="selecte">
                    @if($fiche->type == "jeu")
                    <select name="categorie" id="categorie_jeux">
                        <option value="{{$fiche->categorie}}">{{$fiche->categorie}}</option>
                        <option value="RPG">RPG</option>
                        <option value="FPS">FPS</option>
                        <option value="RTS">RTS</option>
                    </select>
                    @else
                        <select name="categorie" id="categorie_anime">
                            <option value="">Choississez la catégorie</option>
                            <option value="isekai">Isekai</option>
                            <option value="SCience-Fiction">Science-Fiction</option>
                            <option value="fantasy">Fantasy</option>
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
