var currentPaiement = 1; // current paiement selected
var nbPaiement = 1; // number of paiements

function viewOrder(info_order, adr, info_client, products, info_products, paiements, mode_paiements) {
    document.getElementById("overlayViewOrder").style.display = "flex";
    document.getElementById("overlayViewOrder").style.flexDirection = "row"; // open overlay
    document.getElementById("overlayEditOrder").style.display = "none";

    document.getElementById("closeButtonViewOrder").addEventListener("click", closeOverlayOrder);    // close overlay

    document.getElementById("id_orderView").value = info_order.id_commande;
    document.getElementById("dateView").value = info_order.date_commande;
    document.getElementById("statusView").value = info_order.statut_commande;
    document.getElementById("id_client_orderView").value = info_order.id_client;
    document.getElementById("name_client_orderView").value = info_client.nom_client + " " + info_client.prenom_client;
    if (adr != null) {
        document.getElementById("adresseOrderView").value = adr.num_voie + " " + adr.voie + ", " + adr.code_postal + " " + adr.ville + ", " + adr.pays;
    }
    else {
        document.getElementById("adresseOrderView").value = "Adresse de livraison non renseignée dans le profil du client";
    }
    document.getElementById("notesOrderView").value = info_order.note;

    if (products.length == 0) {
        let newD = document.createElement("div");
        newD.className = "blockInfo";
        newD.id = "blockProductView1";
        newD.innerHTML = "Aucun article dans cette commande.";
        document.getElementById("boxProductsView").appendChild(newD);
    }
    else {
        for (let i = 0; i < products.length; i++) {
            let newD = document.createElement("div");
            newD.className = "blockInfo";
            newD.id = "blockProductView" + (i+1);

            let newP = document.createElement("input");
            newP.type = "text";
            newP.className = "itemForm";
            newP.id = "product" + (i+1);
            let nomProduit = "";
            for (let j = 0; j < info_products.length; j++) {
                if (info_products[j].id_produit == products[i].id_produit) {
                    nomProduit = info_products[j].nom_produit;
                    break;
                }
            }
            newP.value = products[i].quantite + "x " + nomProduit;
            newP.setAttribute("readonly", "readonly");
            newD.appendChild(newP);

            document.getElementById("boxProductsView").appendChild(newD);
        }
    }

    document.getElementById("totalOrderView").value = info_order.prix_commande + " €";

    // edit button
    var editBtn = document.createElement("button");
    editBtn.id = "editButtonOrder";
    editBtn.className = "editButton";
    editBtn.type = "button";
    editBtn.addEventListener("click", () => { editOrder(
        info_order, adr, info_client, products, info_products, paiements, mode_paiements
    )});
    document.getElementById("formOrder").appendChild(editBtn);

    // paiements
    if (paiements.length == 0) {
        document.getElementById("paiementView1").style.backgroundColor = "white";
    }
    else if (paiements.length > 1) {
        document.getElementById("paiementView1").addEventListener("click", () => {
            selectPaiementView(1, paiements, mode_paiements);
        });
    }


    for (let i = 0; i < paiements.length; i++) {
        if (i == 0) {
            document.getElementById("paiementView1").style.backgroundColor = "white";
            selectPaiementView(1, paiements, mode_paiements);
        }
        else {
            addPaiementView(i+1, paiements, mode_paiements);
        }
    }
}

function editOrder(info_order, adr, info_client, products, info_products, paiements, mode_paiements) {
    document.getElementById("overlayViewOrder").style.display = "none";
    document.getElementById("closeButtonViewOrder").removeEventListener("click", closeOverlayOrder);   // remove previous event
    document.getElementById("overlayEditOrder").style.display = "flex";
    document.getElementById("overlayEditOrder").style.flexDirection = "row"; // open overlay

    document.getElementById("closeButtonEditOrder").addEventListener("click", closeOverlayEditOrder);    // close overlay

    document.getElementById("addPaiement").addEventListener("click", () => { addPaiement(paiements, mode_paiements) });
    document.getElementById("paiement1").addEventListener("click", () => { selectPaiement(1, paiements, mode_paiements) });
    selectPaiement(1, paiements, mode_paiements);
    document.getElementById("addProduct").addEventListener("click", () => { addProduct(info_products) });

    document.getElementById("id_orderEdit").value = info_order.id_commande;
    document.getElementById("dateEdit").value = info_order.date_commande;
    let n = 0;
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
    var def = document.createElement('option');
    def.value = "";
    def.innerHTML = "Choisir un produit";
    document.getElementById("dropdownProduct1").appendChild(def);
    for (let i = 0; i < info_products.length; i++) {
        let opt = document.createElement('option');
        opt.value = info_products[i].id_produit;
        opt.innerHTML = info_products[i].nom_produit;
        document.getElementById("dropdownProduct1").appendChild(opt);
    }

    if (products.length > 0) {
        for (let i = 0; i < products.length; i++) {
            if (i > 0) {
                addProduct(info_products);
            }
            let indexProduit;
            for (let j = 0; j < info_products.length; j++) {
                if (info_products[j].id_produit == products[i].id_produit) {
                    indexProduit = j;
                    break;
                }
            }
            document.getElementById("dropdownProduct" + (i+1)).selectedIndex = parseInt(indexProduit) + 1;
            document.getElementById("n_product" + (i+1)).value = products[i].quantite;
        }
    }
    document.getElementById("totalOrder").value = info_order.prix_commande + " €";
}

function addProduct(info_products) {
    document.getElementById("addProduct").remove(); // remove button add product to avoid multiple add buttons
    let i = 2;
    let nbProduct = 2;
    let isProduct = true;
    while (isProduct) {
        if (document.getElementById("blockProduct" + i) != null) {
            i++;
            nbProduct++;
        }
        else {
            isProduct = false;
        }
    }

    let newB = document.createElement("div");
    newB.className = "blockInfo";
    newB.id = "blockProduct" + nbProduct;

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

    var add = document.createElement('option');
    add.value = "";
    add.innerHTML = "Choisir un produit";
    document.getElementById("dropdownProduct" + nbProduct).appendChild(add);
    for (let i = 0; i < info_products.length; i++) {
        var opt = document.createElement('option');
        opt.value = info_products[i].id_produit;
        opt.innerHTML = info_products[i].nom_produit;
        document.getElementById("dropdownProduct" + nbProduct).appendChild(opt);
    }
}

function addPaiementView(n, paiements, mode_paiements) {
    var onglets = document.getElementById("ongletsPaiementView");

    var newP = document.createElement("button");
    newP.id = "paiementView" + n;
    newP.className = "onglet";
    newP.innerHTML = "P" + n;
    newP.addEventListener("click", () => {
        selectPaiementView(n, paiements, mode_paiements);
    });

    onglets.appendChild(newP);
}

function addPaiement(paiements, mode_paiements) {
    nbPaiement++;
    document.getElementById("addPaiement").remove(); // remove button add paiement to avoid multiple add buttons
    var onglets = document.getElementById("ongletsPaiement");

    var newP = document.createElement("button");
    newP.id = "paiement" + nbPaiement;
    newP.className = "onglet";
    newP.innerHTML = "P" + nbPaiement;
    newP.type = "button";
    newP.addEventListener("click", () => {
        selectPaiement(nbPaiement, paiements, mode_paiements);
    });

    var newAddPaiement = document.createElement("button");
    newAddPaiement.id = "addPaiement";
    newAddPaiement.className = "onglet addOnglet";
    newAddPaiement.type = "button";
    newAddPaiement.addEventListener("click", () => {
        addPaiement(paiements, mode_paiements);
    });

    onglets.appendChild(newP);
    onglets.appendChild(newAddPaiement);

    var newTypePaiement = document.createElement("select");
    newTypePaiement.id = "typePaiement" + nbPaiement;
    newTypePaiement.className = "itemForm";
    newTypePaiement.name = "typePaiement" + nbPaiement;
    for (let i = 0; i < mode_paiements.length; i++) {
        var opt = document.createElement('option');
        opt.value = mode_paiements[i].id_mode_paiement;
        opt.innerHTML = mode_paiements[i].nom_mode_paiement;
        newTypePaiement.appendChild(opt);
    }
    document.getElementById("typeDiv").appendChild(newTypePaiement);

    var newMontant = document.createElement("input");
    newMontant.id = "montant" + nbPaiement;
    newMontant.className = "itemForm";
    newMontant.name = "montant" + nbPaiement;
    newMontant.type = "number";
    newMontant.placeholder = "0";
    newMontant.min = "0";
    document.getElementById("montantDiv").appendChild(newMontant);

    var newDatePaiement = document.createElement("input");
    newDatePaiement.id = "datePaiement" + nbPaiement;
    newDatePaiement.className = "itemForm";
    newDatePaiement.type = "date";
    newDatePaiement.name = "datePaiement" + nbPaiement;
    document.getElementById("dateDiv").appendChild(newDatePaiement);
    selectPaiement(nbPaiement, paiements, mode_paiements);
}

function selectPaiement(n, paiements, mode_paiements) {
    console.log("select paiement " + n);
    let i = 1;
    let isPaiement = true;
    while (isPaiement) {
        if (i == n) {
            document.getElementById("paiement" + i).style.backgroundColor = "white";   // select new paiement
            document.getElementById("typePaiement" + i).classList.remove("hiddenPaiement");
            document.getElementById("montant" + i).type = "";
            document.getElementById("datePaiement" + i).type = "";
        }
        else {
            if (document.getElementById("paiement" + i) != null) {
                document.getElementById("paiement" + i).style.backgroundColor = "#B4B4B4";   // unselect current paiement
                document.getElementById("typePaiement" + i).classList.add("hiddenPaiement")
                document.getElementById("montant" + i).type = "hidden";
                document.getElementById("datePaiement" + i).type = "hidden";
            }
            else {
                isPaiement = false;
            }
        }
        i++;
    }
}


function selectPaiementView(i, paiements, mode_paiements) {
    document.getElementById("paiementView" + currentPaiement).style.backgroundColor = "#B4B4B4";    // unselect current paiement
    currentPaiement = i;
    document.getElementById("paiementView" + currentPaiement).style.backgroundColor = "white";    // select new paiement

    for (let j = 0; j < mode_paiements.length; j++) {
        if (mode_paiements[j].id_mode_paiement == paiements[i-1].mode_paiement) {
            document.getElementById("typePaiementView").value = mode_paiements[j].nom_mode_paiement;
            break;
        }
    }
    document.getElementById("montantView").value = paiements[i-1].montant_paiement;
    document.getElementById("datePaiementView").value = paiements[i-1].date_paiement;
}

function closeOverlayOrder() {
    document.getElementById("overlayViewOrder").style.display = "none";
    document.getElementById("closeButtonViewOrder").removeEventListener("click", closeOverlayOrder);   // remove previous event
    clearOverlayOrder();
}

function clearOverlayOrder() {
    document.getElementById("boxProductsView").innerHTML = "";
    let i = 1;
    let isProduct = true;
    while (isProduct) {
        if (document.getElementById("blockProductView" + i) != null) {
            document.getElementById("blockProductView" + i).remove();
            i++;
        }
        else {
            isProduct = false;
        }
    }
    document.getElementById("closeButtonEditOrder").removeEventListener("click", closeOverlayEditOrder);   // remove previous event
    document.getElementById("editButtonOrder").remove();
}

function closeOverlayEditOrder() {
    document.getElementById("overlayEditOrder").style.display = "none";
    clearOverlayEdit();
}

function clearOverlayEdit() {
    document.getElementById("boxProducts").innerHTML = "<div class='blockInfo'><input type='number' class='itemForm n_product' id='n_product1' placeholder='0' min='0' name='n_product1'><select id='dropdownProduct1' class='itemForm' name='product1'></select><button id='addProduct' class='itemForm' type='button'></button></div>";
    let i = 2;
    let isProduct = true;
    while (isProduct) {
        if (document.getElementById("blockProduct" + i) != null) {
            document.getElementById("blockProduct" + i).remove();
            i++;
        }
        else {
            isProduct = false;
        }
    }
    clearOverlayOrder();
}