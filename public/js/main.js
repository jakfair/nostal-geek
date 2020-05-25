function ToggleType(type){
    alert(type);
    if(type=="anime"){
        var elements = document.getElementsByClassName("anime");
        var nonelements = document.getElementsByClassName("jeu");
        var nonelements2 = document.getElementsByClassName("cinema");

        for(i = 0;i<elements.length;i++){
            elements[i].style.display = "block";
        }
        for(i = 0;i<nonelements.length;i++){
            nonelements[i].style.display = "none";
        }
        for(i = 0;i<nonelements2.length;i++){
            nonelements2[i].style.display = "none";
        }
    }
    if(type=="jeu"){
        var elements = document.getElementsByClassName("jeu");
        var nonelements = document.getElementsByClassName("anime");
        var nonelements2 = document.getElementsByClassName("cinema");
        for(i = 0;i<elements.length;i++){
            elements[i].style.display = "block";
        }
        for(i = 0;i<nonelements.length;i++){
            nonelements[i].style.display = "none";
        }
        for(i = 0;i<nonelements2.length;i++){
            nonelements2[i].style.display = "none";
        }
    }
    if(type=="cinema"){
        var elements = document.getElementsByClassName("cinema");
        var nonelements = document.getElementsByClassName("anime");
        var nonelements2 = document.getElementsByClassName("jeu");
        for(i = 0;i<elements.length;i++){
            elements[i].style.display = "block";
        }
        for(i = 0;i<nonelements.length;i++){
            nonelements[i].style.display = "none";
        }
        for(i = 0;i<nonelements2.length;i++){
            nonelements2[i].style.display = "none";
        }
    }
}
function togglesearch(type){
    document.getElementById("container-categorie").style.marginLeft ="-"+type+"00vw";
    var buttonsearch = document.getElementsByClassName("buttonsearch");
    for(i=0;i<buttonsearch.length;i++){
        buttonsearch[i].style.borderBottom = "none";
    }
    document.getElementById("buttonsearch"+type).style.borderBottom = "8px solid white";
}
