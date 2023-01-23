
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