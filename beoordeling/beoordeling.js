//berekent de nummers of ze onvoldoende,matig,voldoende of goed zijn
function bereken(getal){
  if(getal > 0 && getal < 50) {
    return 'onvoldoende';
  } else if(getal >= 50 && getal < 60) {
    return 'matig';
  } else if(getal >= 60 && getal < 75) {
    return 'voldoende';
  } else if(getal >= 75 && getal <101) {
    return 'goed';
  } else {
    return false;
  }
}

//berekent de cijfers
function resultaat() {
  var cijfer = document.getElementById("cijfer").value;
  var nummers = bereken(cijfer);

  document.getElementById("uitslag").innerHTML += "Het cijfer is " + cijfer + " en is dus " + nummers + "<br />";
}

//berekent de beoordeling
function resultaat2() {
  var cijfer = document.getElementById("cijfer2").value;
  var nummers = bereken(cijfer);

  document.getElementById("uitslag").innerHTML += "De beoordeling is " + nummers + ", want het cijfer is " + cijfer ;
}
