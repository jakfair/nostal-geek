function ToggleType(type){
    if(type=="anime"){
        var elements = document.getElementsByClassName("anime");
        var nonelements = document.getElementsByClassName("jeu");
        for(i = 0;i<elements.length;i++){
            elements[i].style.display = "block";
        }
        for(i = 0;i<nonelements.length;i++){
            nonelements[i].style.display = "none";
        }
    }
    else{
        var elements = document.getElementsByClassName("jeu");
        var nonelements = document.getElementsByClassName("anime");
        for(i = 0;i<elements.length;i++){
            elements[i].style.display = "block";
        }
        for(i = 0;i<nonelements.length;i++){
            nonelements[i].style.display = "none";
        }
    }
}

$(document).ready(function(){

    $("#fav").click(function(){
        $("#fond").slideToggle("slow");
    });
});
