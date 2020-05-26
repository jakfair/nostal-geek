
    <form method="post" id="formDefis" action="/form/addsuccess" enctype="multipart/form-data">
        <h4 id="titleformdefi">Proposez vos propres success !</h4>
        {{ csrf_field() }}
        <input type="text" name="intitule" placeholder="entrer le success">
        <input type="number" name="points" placeholder="Nombre de points">
        <select name="type" id="">
            <option value="jeu">Jeux vidéo</option>
            <option value="anime">Dessins animés</option>
            <option value="cinema">Films/séries</option>
        </select>
        <button type="submit"><img src="/img/next.png"/></button>
    </form>

