@extends('layouts.app')

@section('content')
    formulaire de création de fiche de jeu vidéo/animé
    <form method="post" id="formfiche" action="/fiche/update/{{$fiche->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="nom" placeholder="entrez le nom de l'oeuvre" value="{{$fiche->nom}}">
        <input type="text" name="description" placeholder="entrez la description de l'oeuvre" value="{{$fiche->description}}">
        <div>Type = {{$fiche ->type}}</div>
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
        <img src="{{$fiche ->icone}}">
        <input type="file" name="icone" accept='image/png, image/jpeg'/>
        @if($fiche->type == "jeu")
        <input type="text" name="lienAchat" placeholder="lien pour acheter" value="{{$fiche->lienAchat}}"/>
        <input type="text" name="lienEmuler" placeholder="lien pour emuler" value="{{$fiche->lienEmuler}}"/>
        @else
        <input type="text" name="lienVoir" placeholder="lien pour regarder" value="{{$fiche->lienVoir}}"/>
        @endif
        @if($fiche->status == "a confirmer")
            <button type="submit" name="status" value="confirme">Confirmer la fiche</button>
        @endif
        @if($fiche->status == "confirme")
            <button type="submit" name="status" value="a confirmer">Deconfirmer la fiche</button>
        @endif
    </form>
@endsection
