@extends('layouts.app')

@section('content')
    @foreach($lienamis as $lienami)
        {{$lienami->email}}
        {{$lienami->status}}
        @if($lienami->status == "en attente")
            @if($lienami->idami1 != $user->id)
                        <form method="get" id="formuser" action="/profil/updateami" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input hidden value="{{$lienami->idami1}}" name="idami1">
                        <input hidden value="{{$lienami->idami2}}" name="idami2">
                        <input hidden value="acceptée" name="value">
                        <button type="submit">Accepter la demande</button>
                </form>
            @endif
        @elseif($lienami->status == "acceptée")
            <form method="get" id="formuser" action="/profil/deleteami" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input hidden value="{{$lienami->idami1}}" name="idami1">
                <input hidden value="{{$lienami->idami2}}" name="idami2">
                <button type="submit">Supprimer cette ami</button>
            </form>
        @endif
    @endforeach
@endsection
