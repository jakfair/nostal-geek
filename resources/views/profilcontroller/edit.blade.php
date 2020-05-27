@extends('layouts.app')

@section('content')
    @auth
        @if($profil->id == \Illuminate\Support\Facades\Auth::id())
        <div class="edit_profil">

            <form method="post" id="formuser" action="/profil/update/{{$profil->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form_profil">
                     <input id="avatar" type="file" name="avatar" style="display: none;">
                    <label for="avatar" style="width: 100vw;"><img src="{{$profil->avatar}}"></label><br>
                    <div id="ptitphrase">Appuyer sur votre avatar pour le changer</div>
                </div>
                <div>
                    <label>Votre pseudo</label><br>
                    <input type="text" name="name" placeholder="Nom" value="{{$profil->name}}"><br>
                    <label>Votre âge</label><br>
                    <input type="text" name="age" placeholder="Age" value="{{$profil->age}}">
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </div>
        @else
            <p>a marche pas</p>
        @endif
    @endauth
@endsection
