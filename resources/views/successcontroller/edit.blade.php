@extends('layouts.app')

@section('content')
    <form method="post" id="formsuccess" action="/success/update/{{$success->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="intitule" placeholder="entrer le success" value="{{$success->intitule}}">
        <select name="type" id="">
            <option hidden value="{{$success->type}}">{{$success->type}}</option>
            <option value="jeu">Jeux vidéo</option>
            <option value="anime">Dessins animés</option>
            <option value="cinema">Films/séries</option>
        </select>
        <input type="number" name="points" placeholder="Nombre de points" value="{{$success->nbPoint}}">
        <button type="submit" name="status" value="confirme">Confirmer le success</button>
    </form>
@endsection
