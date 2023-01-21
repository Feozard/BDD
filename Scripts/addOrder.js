
var nbPaiement = 1;  // number of payment inputs

document.getElementById("addTitleOrder").addEventListener("click", addOrder);    // open overlay
document.getElementById("closeButtonOrder").addEventListener("click", closeOverlay);    // close overlay

function addOrder() {  // open overlay
    document.getElementById("overlayAddOrder").style.display = "flex";
    document.getElementById("overlayAddOrder").style.flexDirection = "row";
}

function closeOverlay() { // close overlay
    nbPaiement = 1; // reset numbers of paiement inputs
    document.getElementById("overlayAddOrder").style.display = "none";
}

// paiement management
// document.getElementById("paiement1").style.backgroundColor = "white";    // set first paiement as selected
// var currentPaiement = 1;
// document.getElementById("paiement1").addEventListener("click", () => {
//     selectPaiement(1);
// });
// document.getElementById("addPaiement").addEventListener("click", addPaiement);    // add a new address input

// function addPaiement() {
//     nbPaiement++;    // increment number of address inputs
//     document.getElementById("addPaiement").remove();    // remove add button to avoid multiple add buttons
//     var onglets = document.getElementById("ongletsPaiement");

//     var newPaiement = document.createElement("button");
//     newPaiement.id = "paiement" + nbPaiement;
//     newPaiement.className = "ongletPaiement";
//     newPaiement.innerHTML = "P" + nbPaiement;
//     newPaiement.addEventListener("click", () => {
//         selectPaiement(nbPaiement);
//     });

//     var newAddPaiement = document.createElement("button");
//     newAddPaiement.id = "addPaiement";
//     newAddPaiement.className = "onglet addOnglet";
//     newAddPaiement.addEventListener("click", addPaiement);

//     onglets.appendChild(newPaiement);
//     onglets.appendChild(newAddPaiement);
    
//     selectPaiement(nbPaiement);
// }

// function selectPaiement(n) {
//     document.getElementById("paiement" + currentPaiement).style.backgroundColor = "#B4B4B4";    // unselect current address
//     currentPaiement = n;
//     document.getElementById("paiement" + currentPaiement).style.backgroundColor = "white";    // select new address

//     // remember to save info before changing paiement
//     // clean address inputs
//     document.getElementById("dropdownPaiement").selectedIndex = "0";
//     document.getElementById("montant").value = "";
//     document.getElementById("datePaiement").value = "";
// }