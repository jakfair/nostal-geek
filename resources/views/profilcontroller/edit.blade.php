@extends('layouts.app')

@section('content')
    @auth
        @if($profil->id == \Illuminate\Support\Facades\Auth::id())
        <div class="edit_profil">

            <form method="post" id="formuser" action="/profil/update/{{$profil->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form_profil">
                     <input id="input_image" type="file" name="avatar" style="display: none;">
                    <label for="input_image" style="width: 100vw;"><img id="img" src="{{$profil->avatar}}"></label><br>
                    <div id="ptitphrase">Appuyez sur votre avatar pour le changer</div>
                </div>
                <div>
                    <label>Bio</label><br/>
                    <textarea name="bio" placeholder="description" value="{{$profil->bio}}" rows="4" cols="50"></textarea><br/>
                    <label>Votre pseudo</label><br>
                    <input type="text" name="name" placeholder="Nom" value="{{$profil->name}}"><br>
                    <label>Votre âge</label><br>
                    <input type="text" name="age" placeholder="Age" value="{{$profil->age}}">
                </div>
                <button type="submit">Modifier votre profil</button>
            </form>
        </div>
        @else
            <p>a marche pas</p>
        @endif
    @endauth
@endsection
