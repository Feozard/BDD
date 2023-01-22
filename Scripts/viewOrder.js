var nbProduct = 1;

function viewOrder(info_order, adr, info_client, products, info_products, paiements, mode_paiements) {
    console.log("viewOrder() called");
    document.getElementById("overlayViewOrder").style.display = "flex";
    document.getElementById("overlayViewOrder").style.flexDirection = "row"; // open overlay
    document.getElementById("overlayEditOrder").style.display = "none";

    document.getElementById("closeButtonViewOrder").addEventListener("click", closeOverlayOrder);    // close overlay

    document.getElementById("editButtonOrder").addEventListener("click", () => { editOrder(
        info_order, adr, info_client, products, info_products, paiements, mode_paiements
    )});

    document.getElementById("id_orderView").value = info_order.id_commande;
    document.getElementById("dateView").value = info_order.date_commande;
    document.getElementById("statusView").value = info_order.statut_commande;
    document.getElementById("id_client_orderView").value = info_order.id_client;
    document.getElementById("name_client_orderView").value = info_client.nom_client + " " + info_client.prenom_client;
    if (adr != null) {
        document.getElementById("adresseOrder").value = adr.num_voie + " " + adr.voie + ", " + adr.code_postal + " " + adr.ville + ", " + adr.pays;
    }
    else {
        document.getElementById("adresseOrder").value = "Adresse non renseignée";
    }
    document.getElementById("notesOrder").value = info_order.note;
}

function editOrder(info_order, adr, info_client, products, info_products, paiements, mode_paiements) {
    console.log("editOrder() called");
    document.getElementById("overlayViewOrder").style.display = "none";
    document.getElementById("closeButtonViewOrder").removeEventListener("click", closeOverlayOrder);   // remove previous event
    //clearOverlayEdit();
    document.getElementById("overlayEditOrder").style.display = "flex";
    document.getElementById("overlayEditOrder").style.flexDirection = "row"; // open overlay

    document.getElementById("closeButtonEditOrder").addEventListener("click", closeOverlayEditOrder);    // close overlay

    document.getElementById("id_orderEdit").value = info_order.id_commande;
    document.getElementById("dateEdit").value = info_order.date_commande;
    switch (info_order.statut_commande) {
        case "À payer" :
            n = 0;
            break;
        case "Payé" :
            n = 1;
            break;
        case "Prêt" :
            n = 2;
            break;
        case "Expédié" :
            n = 3;
            break;
        case "Livré" :
            n = 4;
            break;
        case "Terminé" :
            n = 5;
            break;
        default :
            n = 0;
    }
    document.getElementById("dropdownStatus").selectedIndex = n;
    document.getElementById("id_client_orderEdit").value = info_order.id_client;
    document.getElementById("name_client_orderEdit").value = info_client.nom_client + " " + info_client.prenom_client;
    if (adr != null) {
        document.getElementById("adresseOrder").value = adr.num_voie + " " + adr.voie + ", " + adr.code_postal + " " + adr.ville + ", " + adr.pays;
    }
    else {
        document.getElementById("adresseOrder").value = "Adresse non renseignée";
    }
    document.getElementById("notesOrder").value = info_order.note;

    
    // display products
    for (let i = 0; i < info_products.length; i++) {
        opt = document.createElement('option');
        opt.value = info_products[i].id_produit;
        opt.innerHTML = info_products[i].nom_produit;
        document.getElementById("dropdownProduct1").appendChild(opt);
    }

    document.getElementById("addProduct").addEventListener("click", () => { addProduct(info_products) });
}

function addProduct(info_products) {
    document.getElementById("addProduct").remove(); // remove button add product to avoid multiple add buttons
    nbProduct++;

    let newB = document.createElement("div");
    newB.className = "blockInfo";

    let newN = document.createElement("input");
    newN.type = "number";
    newN.className = "itemForm n_product";
    newN.id = "n_product" + nbProduct;
    newN.name = "n_product" + nbProduct;
    newN.placeholder = "0";
    newN.min = "0";
    newB.appendChild(newN);

    let newD = document.createElement("select");
    newD.className = "itemForm";
    newD.id = "dropdownProduct" + nbProduct;
    newD.name = "product" + nbProduct;
    newB.appendChild(newD);

    let newA = document.createElement("button");
    newA.className = "itemForm";
    newA.id = "addProduct";
    newA.type = "button";
    newA.addEventListener("click", () => { addProduct(info_products) });
    newB.appendChild(newA);

    document.getElementById("boxProducts").appendChild(newB);

    for (let i = 0; i < info_products.length; i++) {
        opt = document.createElement('option');
        opt.value = info_products[i].id_produit;
        opt.innerHTML = info_products[i].nom_produit;
        document.getElementById("dropdownProduct" + nbProduct).appendChild(opt);
    }
}

function closeOverlayOrder() {
    console.log("close");
    document.getElementById("overlayViewOrder").style.display = "none";
    document.getElementById("closeButtonViewOrder").removeEventListener("click", closeOverlayOrder);   // remove previous event
    //clearOverlay();
}

function closeOverlayEditOrder() {
    console.log("closeEdit");
    document.getElementById("overlayEditOrder").style.display = "none";
    document.getElementById("closeButtonEditOrder").removeEventListener("click", closeOverlayEditOrder);   // remove previous event
    //clearOverlayEdit();
}