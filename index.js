var isOnClients = true; // true if we are on clients tab, false if we are on orders tab

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

document.getElementById("addTitle").addEventListener("click", addClient);

function switchClients() {
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

function addClient() {
    console.log("add client");
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
        var listBox = document.getElementById("listBox");
        var exportBtn = document.createElement("p");
        exportBtn.innerHTML = "<img src='Icons/export.svg' alt='export icon' class='icon'> Exporter";
        exportBtn.id = "exportBtn";
        exportBtn.className = "titleSection";
        listBox.appendChild(exportBtn);

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
}

function exportList() {
    console.log("export list");
}