function ToggleType(type){
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
        buttonsearch[i].style.backgroundColor = "transparent";
    }
    document.getElementById("buttonsearch"+type).style.backgroundColor  = "#52BEC8";
}

function toggleprofil(type){
    document.getElementById("fond").style.marginLeft ="-"+type+"00vw";
    var buttonsearch = document.getElementsByClassName("buttonsearch");
    for(i=0;i<buttonsearch.length;i++){
        buttonsearch[i].style.backgroundColor = "transparent";
    }
    document.getElementById("buttonsearch"+type).style.backgroundColor  = "#52BEC8";
}
$('#input_image').on('change', function(){
    var input = document.getElementById('input_image');
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
            document.getElementById('img').style.width = "50%";
        }
        reader.readAsDataURL(input.files[0]);
    }
    else{
        $('#img').attr('src', '/assets/no_preview.png');
    }
});
$('#input_image2').on('change', function(){
    var input = document.getElementById('input_image2');
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img2').attr('src', e.target.result);
            document.getElementById('img2').style.width = "50%";
        }
        reader.readAsDataURL(input.files[0]);
    }
    else{
        $('#img').attr('src', '/assets/no_preview.png');
    }
});
$(window).load(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
});
