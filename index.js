var isOnClients = true;

document.getElementById("searchBar").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        search();
      }
});

function search() {
    if (isOnClients) {
        searchClients();
    }
    else {
        searchOrders();
    }
}


// Clients

document.getElementById("clients").addEventListener("click", switchClients);
document.getElementById("orders").addEventListener("click", switchOrders);

function switchClients() {
    isOnClients = true;
    document.getElementById("clients").style.borderBottom = "4px solid #22333B";
    document.getElementById("orders").style.borderBottom = "4px solid transparent";

    document.getElementById("searchTitle").innerHTML = "<img src='Icons/search.svg' alt='search icon' class='icon'> Rechercher un client";
    document.getElementById("listTitle").innerHTML = "<img src='Icons/list.svg' alt='list icon' class='icon'> Liste des clients";


    document.getElementById("searchBar").value = "";
}

function searchClients() {
    let search = document.getElementById("searchBar");
    let searchValue = search.value;
    console.log("search in clients");
    console.log(searchValue);
}



// Orders

function switchOrders() {
    isOnClients = false;
    document.getElementById("clients").style.borderBottom = "4px solid transparent";
    document.getElementById("orders").style.borderBottom = "4px solid #22333B";

    document.getElementById("searchTitle").innerHTML = "<img src='Icons/search.svg' alt='search icon' class='icon'> Rechercher une commande";
    document.getElementById("listTitle").innerHTML = "<img src='Icons/list.svg' alt='list icon' class='icon'> Liste des commandes";

    document.getElementById("searchBar").value = "";
}

function searchOrders() {
    let search = document.getElementById("searchBar");
    let searchValue = search.value;
    console.log("search in orders");
    console.log(searchValue);
}
