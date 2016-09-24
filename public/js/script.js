/**
 * Created by oriol on 22/09/16.
 */

window.onload=miFuncion;
//TODO arreglar fer que uncioni a totes les vistes
function miFuncion() {
    var $contingut = document.getElementById("#contingutArticle").innerHTML;
    var decodedText = $("<p/>").html($contingut).text();
    document.getElementById("#contingutArticle").innerHTML=decodedText;
    var $contingut = document.getElementById("#contingutDesccripcio").innerHTML;
    var decodedText = $("<p/>").html($contingut).text();
    document.getElementById("#contingutDesccripcio").innerHTML=decodedText;
    alert();
}

