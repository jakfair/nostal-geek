@extends('layouts.app')

@section('content')
    <div class="fiche_form">
        <div class="fiche_form_title">
        <span>formulaire</span><br/>
     <span>création de fiche de jeu vidéo/animé</span>
        </div>
    <form method="post" id="formfiche" action="/form/addfiche" enctype="multipart/form-data">
        {{ csrf_field() }}
        <span class="fiche_form_text">Titre</span>
        <input type="text" name="nom" placeholder="entrez le nom de l'oeuvre"><br/>
        <span class="fiche_form_text">Description</span>
        <input type="text" name="description" placeholder="entrez la description de l'oeuvre">
        <div class="button_radio_lst">
            <ul id="row">
                <ul>
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
                <ul>
                    <select class="jeu" name="categorie_jeu" id="categorie_jeux">
                        <option value="RPG" selected>RPG</option>
                        <option value="FPS">FPS</option>
                        <option value="RTS">RTS</option>
                    </select>
                    <select class="anime" name="categorie_anime" id="categorie_anime" style="display: none">
                        <option value="isekai" selected>Isekai</option>
                        <option value="science-fiction">Science-Fiction</option>
                        <option value="fantasy">Fantasy</option>
                    </select>
                    <select class="cinema" name="categorie_cinema" id="categorie_cinema" style="display: none">
                        <option value="horreur" selected>Horreur</option>
                        <option value="drame">Drame</option>
                        <option value="comedie">Comédie</option>
                    </select>
                </ul>
            </ul>

        </div>
        <input type="file" name="banniere" accept='image/png, image/jpeg'/>
        <input type="file" name="icone" accept='image/png, image/jpeg'/>
        <input class="jeu" type="text" name="lienAchat" placeholder="lien pour acheter"/>
        <input class="jeu" type="text" name="lienEmuler" placeholder="lien pour emuler"/>
        <input class="anime" type="text" name="lienVoiranime" placeholder="lien pour regarder" style="display: none"/>
        <input class="cinema" type="text" name="lienVoircinema" placeholder="lien pour regarder" style="display: none"/>

        <button type="submit">Envoyer</button>
    </form>
    </div>
@endsection
