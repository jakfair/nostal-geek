
    <form method="post" id="formDefis" action="/form/addDefis" enctype="multipart/form-data">
        <h4 id="titleformdefi">Proposez vos propres défis pour vos jeux favoris !</h4>
        {{ csrf_field() }}
        <input type="text" name="intitule" placeholder="entrer le defis">
        <select class="jeu" name="categorie" id="">
            <option value="quotidien">Quotidien</option>
            <option value="hebdomadaire">Hebdomadaire</option>
            <option value="mensuel">Mensuel</option>
        </select>
        <input type="number" name="points" placeholder="Nombre de points">
        <input type="file" name="icone" accept='image/png, image/jpeg'/>
        <input type="hidden" name="idjeu" value="{{$fiche->id}}">
        <button type="submit"><img src="/img/next.png"/></button>
    </form>

