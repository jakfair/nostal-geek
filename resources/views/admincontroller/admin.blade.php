<?php

@foreach($general as $generals)
    {{$generals->intitule}}
@endforeach
@foreach($defi as $defis)
    {{$defis->intitule}}

@endforeach

@foreach($fiches as $fiche)
    {{$fiche->nom}}
    <a href="/fiche/edit/{id}">test</a>
@endforeach

?>
