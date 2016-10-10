/**
 * Created by oriol on 22/09/16.
 */

window.onload=miFuncion;
//TODO arreglar fer que uncioni a totes les vistes
function miFuncion() {
    if(document.getElementById("#contingutArticle")){
        var $contingut = document.getElementById("#contingutArticle").innerHTML;
        var decodedText = $("<p/>").html($contingut).text();
        document.getElementById("#contingutArticle").innerHTML=decodedText;
    }
    if(document.getElementById("#contingutDesccripcio")) {
        var $contingut = document.getElementById("#contingutDesccripcio").innerHTML;
        var decodedText = $("<p/>").html($contingut).text();
        document.getElementById("#contingutDesccripcio").innerHTML = decodedText;
    }
    $("#caracters").html(" "+ $("#description").val().length+" de 140");
    $("#description").on('keydown',function () {
        $("#caracters").html($("#description").val().length+"de 140");
    });

    }
