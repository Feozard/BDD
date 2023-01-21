
var nbPaiement = 1;  // number of payment inputs

// MENU
var isOnClients = true; // true if we are on clients tab, false if we are on orders tab
switchClients();

document.getElementById("clients").addEventListener("click", switchClients);    // switch to clients tab
document.getElementById("orders").addEventListener("click", switchOrders);  // switch to orders tab

function switchClients() {
    document.getElementById("clients").style.borderBottom = "4px solid #22333B";    
    document.getElementById("orders").style.borderBottom = "4px solid transparent";

    document.getElementById("searchBoxClient").style.display = "";    
    document.getElementById("searchBoxOrder").style.display = "none";   
    document.getElementById("listBoxClient").style.display = "";   
    document.getElementById("listBoxOrder").style.display = "none"; 

    document.getElementById("searchBar").value = "";    // clear searchbar

    isOnClients = true;
}

function switchOrders() {
    document.getElementById("clients").style.borderBottom = "4px solid transparent";
    document.getElementById("orders").style.borderBottom = "4px solid #22333B";

    document.getElementById("searchBoxClient").style.display = "none";    
    document.getElementById("searchBoxOrder").style.display = "";   
    document.getElementById("listBoxClient").style.display = "none";   
    document.getElementById("listBoxOrder").style.display = ""; 

    document.getElementById("searchBar").value = "";    // clear searchbar

    isOnClients = false;
}

// CLIENTS
var nbTel = 1;  // number of tel inputs
var nbAdr = 1;  // number of address inputs

document.getElementById("addTitle").addEventListener("click", addClient);    // open overlay
document.getElementById("closeButtonClient").addEventListener("click", closeOverlayClient);    // close overlay

function addClient() {  // open overlay
    document.getElementById("overlayAddClient").style.display = "flex";
    document.getElementById("overlayAddClient").style.flexDirection = "row";
}

function closeOverlayClient() { // close overlay
    // reset all inputs
    nbAdr = 1;  // reset number of address inputs
    nbTel = 1;  // reset number of tel inputs

    document.getElementById("overlayAddClient").style.display = "none";
}

// tel management
document.getElementById("addTel").addEventListener("click", addTel);    // add a new tel input

function addTel() {
    nbTel++;    // increment number of tel inputs
    document.getElementById("addTel").remove();    // remove add button to avoid multiple add buttons

    document.getElementById("telNum1").innerHTML = "Tél. 1";    // change tel label for multiple tels

    var telBox = document.getElementById("telBox");

    var newDiv = document.createElement("div");
    newDiv.className = "blockInfo";

    var newTelNum = document.createElement("p");
    newTelNum.className = "subtitle";
    newTelNum.innerHTML = "Tél. " + nbTel;
    newTelNum.id = "telNum" + nbTel;

    var newDropdownTel = document.createElement("select");
    newDropdownTel.className = "itemForm";
    newDropdownTel.id = "dropdownTel";
    newDropdownTel.name = "codeTel" + nbTel;
    newDropdownTel.innerHTML = "<option value='+33'>+33</option><option value='autre'>Autre</option>";

    var newTel = document.createElement("input");
    newTel.type = "tel";
    newTel.id = "phone";
    newTel.className = "itemForm";
    newTel.name = "numTel" + nbTel;
    newTel.placeholder = "06 12 34 56 78";

    var newAddTel = document.createElement("button");
    newAddTel.id = "addTel";
    newAddTel.type = "button";
    newAddTel.className = "itemForm";
    newAddTel.addEventListener("click", addTel);

    newDiv.appendChild(newTelNum);
    newDiv.appendChild(newDropdownTel);
    newDiv.appendChild(newTel);
    newDiv.appendChild(newAddTel);

    telBox.appendChild(newDiv);
}

// address management
document.getElementById("adr1").style.backgroundColor = "white";    // set first address as selected
document.getElementById("adr1").addEventListener("click", () => {   // add function to select first address
    selectAdr(1);
});
selectAdr(1);  // select first address by default
document.getElementById("addAdr").addEventListener("click", addAdr);    // add function to add a new address input

function addAdr() {
    nbAdr++;    // increment number of address inputs
    document.getElementById("addAdr").remove();    // remove add button to avoid multiple add buttons
    var onglets = document.getElementById("ongletsAdr");

    var newAdr = document.createElement("button");
    newAdr.id = "adr" + nbAdr;
    newAdr.className = "onglet";
    newAdr.type = "button";
    newAdr.innerHTML = "Adr. " + nbAdr;
    newAdr.addEventListener("click", () => {
        selectAdr(nbAdr);
    });

    var newAddAdr = document.createElement("button");
    newAddAdr.id = "addAdr";
    newAddAdr.className = "onglet addOnglet";
    newAddAdr.addEventListener("click", addAdr);

    onglets.appendChild(newAdr);
    onglets.appendChild(newAddAdr);

    var newDropDownAdr = document.createElement("select");
    newDropDownAdr.className = "itemForm";
    newDropDownAdr.id = "dropdownAdr" + nbAdr;
    newDropDownAdr.name = "typeAdr" + nbAdr;
    newDropDownAdr.innerHTML = "<option value='Facturation'>Facturation</option><option value='Livraison'>Livraison</option>";
    document.getElementById("dropDownDiv").appendChild(newDropDownAdr);

    var newNumVoie = document.createElement("input");
    newNumVoie.type = "text";
    newNumVoie.id = "numVoie" + nbAdr;
    newNumVoie.className = "itemForm";
    newNumVoie.name = "numVoie" + nbAdr;
    newNumVoie.placeholder = "1";
    document.getElementById("numVoieDiv").appendChild(newNumVoie);

    var newVoie = document.createElement("input");
    newVoie.type = "text";
    newVoie.id = "voie" + nbAdr;
    newVoie.className = "itemForm";
    newVoie.name = "voie" + nbAdr;
    newVoie.placeholder = "Rue de la Paix";
    document.getElementById("voieDiv").appendChild(newVoie);

    var newVille = document.createElement("input");
    newVille.type = "text";
    newVille.id = "ville" + nbAdr;
    newVille.className = "itemForm";
    newVille.name = "ville" + nbAdr;
    newVille.placeholder = "Paris";
    document.getElementById("villeDiv").appendChild(newVille);

    var newCodePostal = document.createElement("input");
    newCodePostal.type = "text";
    newCodePostal.id = "zip" + nbAdr;
    newCodePostal.className = "itemForm";
    newCodePostal.name = "zip" + nbAdr;
    newCodePostal.placeholder = "75000";
    newCodePostal.style.order = "1";
    document.getElementById("zipDiv").appendChild(newCodePostal);
    document.getElementById("countrySubtitle").style.order = "2";

    var newPays = document.createElement("input");
    newPays.type = "text";
    newPays.id = "pays" + nbAdr;
    newPays.className = "itemForm";
    newPays.name = "pays" + nbAdr;
    newPays.placeholder = "France";
    newPays.style.order = "3";
    document.getElementById("zipDiv").appendChild(newPays);
    selectAdr(nbAdr);
}

function selectAdr(n) {
    let i = 1;
    let isAdr = true;
    while (isAdr) {
        if (i == n) { // this address is selected
            document.getElementById("adr" + i).style.backgroundColor = "white";    // select new address
            document.getElementById("dropdownAdr" + i).style.display = "block"; // show new address
            // document.getElementById("dropdownAdr" + i).setAttribute("required", "");    // make new address required
            document.getElementById("numVoie" + i).style.display = "block";
            // document.getElementById("numVoie" + i).setAttribute("required", "");
            document.getElementById("voie" + i).style.display = "block";
            // document.getElementById("voie" + i).setAttribute("required", "");
            document.getElementById("ville" + i).style.display = "block";
            // document.getElementById("ville" + i).setAttribute("required", "");
            document.getElementById("zip" + i).style.display = "block";
            // document.getElementById("zip" + i).setAttribute("required", "");
            document.getElementById("pays" + i).style.display = "block";
            // document.getElementById("pays" + i).setAttribute("required", "");
        }
        else {
            if (document.getElementById("adr" + i) != null) { // this address exists
                document.getElementById("adr" + i).style.backgroundColor = "#B4B4B4";    // unselect previous address
                // document.getElementById("dropdownAdr" + i).removeAttribute("required");   // make previous address not required in order to redisplay it after
                document.getElementById("dropdownAdr" + i).style.display = "none"; // hide previous address

                // document.getElementById("numVoie" + i).removeAttribute("required");
                document.getElementById("numVoie" + i).style.display = "none";

                // document.getElementById("voie" + i).removeAttribute("required");
                document.getElementById("voie" + i).style.display = "none";

                // document.getElementById("ville" + i).removeAttribute("required");
                document.getElementById("ville" + i).style.display = "none";

                // document.getElementById("zip" + i).removeAttribute("required");
                document.getElementById("zip" + i).style.display = "none";

                // document.getElementById("pays" + i).removeAttribute("required");
                document.getElementById("pays" + i).style.display = "none";
            }
            else { // this address doesn't exist
                isAdr = false;
            }
        }
        i++;
    }
}





function addOrder() {
    console.log("add order");
    document.getElementById("overlayAddOrder").style.display = "flex";
    document.getElementById("overlayAddOrder").style.flexDirection = "row";
}

document.getElementById("closeButtonOrder").addEventListener("click", closeOverlayOrder);    // close overlay

function closeOverlayOrder() {
    console.log("close overlay");
    nbPaiement = 1; // reset numbers of paiement inputs
    document.getElementById("overlayAddOrder").style.display = "none";
}

function exportList() {
    console.log("export list");
}

// paiement management
document.getElementById("paiement1").style.backgroundColor = "white";    // set first paiement as selected
var currentPaiement = 1;
document.getElementById("paiement1").addEventListener("click", () => {
    selectPaiement(1);
});
document.getElementById("addPaiement").addEventListener("click", addPaiement);    // add a new address input

function addPaiement() {
    nbPaiement++;    // increment number of address inputs
    document.getElementById("addPaiement").remove();    // remove add button to avoid multiple add buttons
    var onglets = document.getElementById("ongletsPaiement");

    var newPaiement = document.createElement("button");
    newPaiement.id = "paiement" + nbPaiement;
    newPaiement.className = "ongletPaiement";
    newPaiement.innerHTML = "P" + nbPaiement;
    newPaiement.addEventListener("click", () => {
        selectPaiement(nbPaiement);
    });

    var newAddPaiement = document.createElement("button");
    newAddPaiement.id = "addPaiement";
    newAddPaiement.className = "onglet addOnglet";
    newAddPaiement.addEventListener("click", addPaiement);

    onglets.appendChild(newPaiement);
    onglets.appendChild(newAddPaiement);
    
    selectPaiement(nbPaiement);
}

function selectPaiement(n) {
    document.getElementById("paiement" + currentPaiement).style.backgroundColor = "#B4B4B4";    // unselect current address
    currentPaiement = n;
    document.getElementById("paiement" + currentPaiement).style.backgroundColor = "white";    // select new address

    // remember to save info before changing paiement
    // clean address inputs
    document.getElementById("dropdownPaiement").selectedIndex = "0";
    document.getElementById("montant").value = "";
    document.getElementById("datePaiement").value = "";
}