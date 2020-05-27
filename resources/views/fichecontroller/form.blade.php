@extends('layouts.app')

@section('content')
    <div class="fiche_form">
        <div class="fiche_form_title">
            <span>Formulaire</span><br/>
            <span>Création de fiche de jeu vidéo/animé</span>
        </div>
    <form method="post" id="formfiche" action="/form/addfiche" enctype="multipart/form-data">
        {{ csrf_field() }}
        <span class="fiche_form_text">Titre</span></br>
            <input type="text" name="nom" placeholder="Entrez le nom de l'oeuvre" required><br/>
        <span class="fiche_form_text">Description</span></br>
            <input type="text" name="description" placeholder="Entrez la description de l'oeuvre" required><br>
        <span class="fiche_form_text">Année de sortie</span></br>
        <input type="text" name="annee" placeholder="Entrez l'année de sortie de l'oeuvre" required>
        <div class="button_radio_lst">
            <ul id="row">
                <ul id="liste">
                    <span class="fiche_form_text">Type D'oeuvre</span><br/>
                    <div>
                        <input type="radio" id="jeu" name="type" value="jeu" checked onclick="ToggleType('jeu')">
                        <label for="jeu">Jeu vidéo</label>
                    </div>

                    <div>
                        <input type="radio" id="anime" name="type" value="anime" onclick="ToggleType('anime')">
                        <label for="anime">Dessin animé</label>
                    </div>
                    <div>
                        <input type="radio" id="cinema" name="type" value="cinema" onclick="ToggleType('cinema')">
                        <label for="cinema">Cinema/série</label>
                    </div>
                </ul>
                <ul id="categ">
                    <select class="jeu" name="categorie_jeu" id="categorie_jeux">
                        <option value="RPG" selected>RPG</option>
                        <option value="FPS">FPS</option>
                        <option value="RTS">RTS</option>
                        <option value="RPG" selected>RPG</option>
                        <option value="course">Course</option>
                        <option value="plateforme">Plateforme</option>
                        <option value="horreur">Horreur</option>
                        <option value="action">Action</option>
                        <option value="gestion">Gestion</option>
                        <option value="simulateurdevie">Simulateur de vie</option>
                    </select>
                    <select class="anime" name="categorie_anime" id="categorie_anime" style="display: none">
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
                    <select class="cinema" name="categorie_cinema" id="categorie_cinema" style="display: none">
                        <option value="comedie" selected>Comédie</option>
                        <option value="drame">Drame</option>
                        <option value="horreur">Horreur</option>
                        <option value="fantasy">Fantastique</option>
                        <option value="sitcom">Sitcom</option>
                        <option value="aventure">Aventure</option>
                        <option value="science-fiction">Science-Fiction</option>
                    </select>
                </ul>
            </ul>

        </div>
        <div id="fichiers">
            <p>Ajouter une bannière</p>
            <input id="input_banniere" type="file" name="banniere" accept='image/png, image/jpeg' style="display: none" required/>
                <label for="input_banniere"><img src="/img/plus.png"></label>
            <p>Ajouter un icon</p>
            <input id="input_icon" type="file" name="icone" accept='image/png, image/jpeg' style="display: none" required/>
                <label for="input_icon"><img src="/img/plus.png"></label>
        </div>
        <div id="liens">
            <input class="jeu" type="text" name="lienAchat" placeholder="Lien pour acheter"/>
            <input class="jeu" type="text" name="lienEmuler" placeholder="Lien pour émuler"/>
            <input class="anime" type="text" name="lienVoir" placeholder="Lien pour regarder" style="display: none"/>
            <input class="cinema" type="text" name="lienVoir" placeholder="Lien pour regarder" style="display: none"/>
        </div>
        <div id="buttonsend">
            <button type="submit">Envoyer</button>
        </div>
    </form>
    </div>
@endsection
