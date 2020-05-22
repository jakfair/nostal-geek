@extends('layouts.app')

@section('content')
ceci est un profil
{{$profil->name}}
    @if($user->id == $profil->id)
    c'est toi même
    @else
        @if($lienami == "none")
        <form method="post" id="formAmi" action="/profil/addami">
            @csrf
            <input hidden value="{{$profil->id}}" name="idami">
            <button type="submit">Envoyer</button>
        </form>
            @else
                {{$lienami->status}}
            @endif
    @endif
@endsection
