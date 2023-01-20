var isOnClients = true; // true if we are on clients tab, false if we are on orders tab
var nbPaiement = 1;  // number of payment inputs

document.getElementById("searchBar").addEventListener("keypress", function(event) { // search when pressing enter
    if (event.key === "Enter") {
        search();
      }
});

function search() { // check in which tab we are
    if (isOnClients) {
        searchClients();
    }
    else {
        searchOrders();
    }
}

document.getElementById("clients").addEventListener("click", switchClients);    // switch to clients tab
document.getElementById("orders").addEventListener("click", switchOrders);  // switch to orders tab

// Clients


function switchClients() {
    console.log(isOnClients);
    if (!isOnClients) {
        document.getElementById("clients").style.borderBottom = "4px solid #22333B";    
        document.getElementById("orders").style.borderBottom = "4px solid transparent";

        // change titles
        document.getElementById("searchTitle").innerHTML = "<img src='Icons/search.svg' alt='search icon' class='icon'> Rechercher un client";
        document.getElementById("listTitle").innerHTML = "<img src='Icons/list.svg' alt='list icon' class='icon'> Liste des clients";
        document.getElementById("addTitle").innerHTML = "<img src='Icons/add.svg' alt='add icon' class='icon'> Ajouter un client";

        // add interactions
        document.getElementById("addTitle").removeEventListener("click", addOrder);
        document.getElementById("addTitle").addEventListener("click", addClient);

        // remove export button
        var listBox = document.getElementById("listBox");
        var exportBtn = document.getElementById("exportBtn");
        listBox.removeChild(exportBtn);

        document.getElementById("searchBar").value = "";    // clear searchbar

        isOnClients = true;
    }
}

function searchClients() {
    let search = document.getElementById("searchBar");  // get search value
    let searchValue = search.value;
    console.log("search in clients");
    console.log(searchValue);
}

// Orders

function switchOrders() {
    if (isOnClients) {
        document.getElementById("clients").style.borderBottom = "4px solid transparent";
        document.getElementById("orders").style.borderBottom = "4px solid #22333B";
    
        // change titles
        document.getElementById("searchTitle").innerHTML = "<img src='Icons/search.svg' alt='search icon' class='icon'> Rechercher une commande";
        document.getElementById("listTitle").innerHTML = "<img src='Icons/list.svg' alt='list icon' class='icon'> Liste des commandes";
        document.getElementById("addTitle").innerHTML = "<img src='Icons/add.svg' alt='add icon' class='icon'> Ajouter une commande";
    
        // add export button
        var listBox = document.getElementById("listTitleDiv");
        var exportBtn = document.createElement("p");
        exportBtn.innerHTML = "<img src='Icons/export.svg' alt='export icon' class='icon'> Exporter";
        exportBtn.id = "exportBtn";
        exportBtn.className = "titleSection";
        listBox.appendChild(exportBtn); // POURQUOI Y'A UN PROBLEME ICI

        // add interactions
        document.getElementById("addTitle").removeEventListener("click", addClient);
        document.getElementById("addTitle").addEventListener("click", addOrder);
        document.getElementById("exportBtn").addEventListener("click", exportList);
    
        document.getElementById("searchBar").value = "";    // clear searchbar
    
        isOnClients = false;
    }
}

function searchOrders() {
    let search = document.getElementById("searchBar");  // get search value
    let searchValue = search.value;
    console.log("search in orders");
    console.log(searchValue);
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