//haalt de value wat ingevuld is binnen
function lijstje() {
  var boodschappen = document.getElementById("boodschappenlijst").value;
  return(boodschappen);
}

//laat boodschappenlijstje onder elkaar komen met array
//functie split gebruikt om de komma's eruit te halen
function maakLijst() {
 var boodschappen = lijstje();
 var boodschappenArray = boodschappen.split(",");
 var content = "";

for (var i = 0; i < boodschappenArray.length; i++) {
  content += boodschappenArray[i];
  content += "<br>";
}

showLijstje(content);

}

//laat boodschappenlijstje zien op scherm
function showLijstje(content) {
document.getElementById("lijstje").innerHTML = "<br /> De boodschappen zijn: <br /><br />" + content ;
}
