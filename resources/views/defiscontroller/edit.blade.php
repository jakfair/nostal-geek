@extends('layouts.app')

@section('content')
    Formulaire pour créer des défis
    {{$fiche->nom}}
    <form method="post" id="formDefis" action="/defi/update/{{$defis->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="intitule" placeholder="entrer le defis" value="{{$defis->intitule}}">
        <select class="jeu" name="categorie" id="">
            <option hidden value="{{$defis->categorie}}">{{$defis->categorie}}</option>
            <option value="quotidien">Quotidien</option>
            <option value="hebdomadaire">Hebdomadaire</option>
            <option value="mensuel">Mensuel</option>
        </select>
        <input type="number" name="points" placeholder="Nombre de points" value="{{$defis->nbPoint}}">
        <img src="{{$defis->icone}}">
        <input type="file" name="icone" accept='image/png, image/jpeg'/>
        <button type="submit" name="status" value="confirme">Confirmer la fiche</button>

    </form>
@endsection
