@extends('layouts.app')

@section('content')
    formulaire de création de fiche de jeu vidéo/animé
    <form method="post" id="formfiche" action="/form/addfiche" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="nom" placeholder="entrez le nom de l'oeuvre">
        <input type="text" name="description" placeholder="entrez la description de l'oeuvre">
        <div>
            <input type="radio" id="jeu" name="type" value="jeu"
                   checked onclick="ToggleType('jeu')">
            <label for="jeu">Jeu vidéo</label>
        </div>

        <div>
            <input type="radio" id="anime" name="type" value="anime" onclick="ToggleType('anime')">
            <label for="anime">Dessin animé</label>
        </div>
        <select class="jeu" name="categorie" id="categorie_jeux">
            <option value="">Choississez la catégorie</option>
            <option value="RPG">RPG</option>
            <option value="FPS">FPS</option>
            <option value="RTS">RTS</option>
        </select>
        <select class="anime" name="categorie" id="categorie_anime">
            <option value="">Choississez la catégorie</option>
            <option value="isekai">Isekai</option>
            <option value="SCience-Fiction">Science-Fiction</option>
            <option value="fantasy">Fantasy</option>
        </select>
        <input type="file" name="banniere" accept='image/png, image/jpeg'/>
        <input type="file" name="icone" accept='image/png, image/jpeg'/>
        <input class="jeu" type="text" name="lienAchat" placeholder="lien pour acheter"/>
        <input class="jeu" type="text" name="lienEmuler" placeholder="lien pour emuler"/>
        <input class="anime" type="text" name="lienVoir" placeholder="lien pour regarder"/>
        <button type="submit">Envoyer</button>
    </form>
@endsection
