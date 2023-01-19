currentAdr = 1; // current address selected

function viewClient(info, telephone, adresses, points, sum_points) {
    document.getElementById("overlayViewClient").style.display = "flex";
    document.getElementById("overlayViewClient").style.flexDirection = "row"; // open overlay

    document.getElementById("lastNameView").value = info.nom_client; // set value of input
    document.getElementById("firstNameView").value = info.prenom_client;
    document.getElementById("id_clientView").value = info.id_client;
    document.getElementById("mailView").value = info.mail;
    document.getElementById("facebookView").value = info.fb;
    document.getElementById("instagramView").value = info.insta;
    document.getElementById("levelView").value = info.membership;
    document.getElementById("nbPointsView").value = sum_points;

    // phones
    var nbTel = telephone.length;
    if (nbTel > 1) {
        document.getElementById("telNumView0").innerHTML = "Tél. 1";    // change tel label for multiple tels
    }

    for (let i = 0; i < nbTel; i++) {
        if (i == 0) {
            document.getElementById("codePhoneView0").value = "+" + telephone[i].code_region;
            document.getElementById("phoneView0").value = telephone[i].num_telephone;
        }
        else {
            addPhoneView(i+1);  // add new tel box
            document.getElementById("telNumView" + i).innerHTML = "Tél. " + (i+1);
            document.getElementById("codePhoneView" + i).value = "+" + telephone[i].code_region;
            document.getElementById("phoneView" + i).value = telephone[i].num_telephone;
        }
    }

    // addresses
    var nbAdr = adresses.length;

    if (nbAdr > 1) {
        document.getElementById("adrView1").addEventListener("click", () => {   // add selection event to first address
            selectAdr(1, adresses);
        });
    }

    for (let i = 0; i < nbAdr; i++) {
        if (i == 0) {
            document.getElementById("adrView1").style.backgroundColor = "white";    // set first address as default
            selectAdr(1, adresses);  
        }
        else {
            addAdrView(i+1, adresses);    // add new address box
        }
    }

    // Reste affichage de l'historique des points

    console.log("add close function");
    document.getElementById("closeButtonViewClient").addEventListener("click", () => { closeOverlay(nbTel, nbAdr) });    // close overlay
}

function addPhoneView(n) {  // add a new phone view
    var telBox = document.getElementById("telBoxView");

    var newDiv = document.createElement("div");
    newDiv.className = "blockInfo";
    newDiv.id = "tel" + (n-1);

    var newTelNum = document.createElement("p");
    newTelNum.className = "subtitle";
    newTelNum.innerHTML = "Tél. " + n;
    newTelNum.id = "telNumView" + (n-1);

    var newCodePhone = document.createElement("input");
    newCodePhone.className = "itemForm code_region";
    newCodePhone.id = "codePhoneView" + (n-1);
    newCodePhone.readOnly = true;

    var newTel = document.createElement("input");
    newTel.type = "tel";
    newTel.id = "phoneView" + (n-1);
    newTel.className = "itemForm";
    newTel.readOnly = true;

    newDiv.appendChild(newTelNum);
    newDiv.appendChild(newCodePhone);
    newDiv.appendChild(newTel);

    telBox.appendChild(newDiv);
}

function addAdrView(n, adresses) {  // add a new address view
    var onglets = document.getElementById("ongletsAdrView");

    var newAdr = document.createElement("button");
    newAdr.id = "adrView" + n;
    newAdr.className = "onglet";
    newAdr.innerHTML = "Adr. " + n;
    newAdr.addEventListener("click", () => {
        selectAdr(n, adresses);
    });

    onglets.appendChild(newAdr);
}

function selectAdr(i, adresses) { // select an address
    document.getElementById("adrView" + currentAdr).style.backgroundColor = "#B4B4B4";    // unselect current address
    currentAdr = i;
    document.getElementById("adrView" + currentAdr).style.backgroundColor = "white";    // select new address

    document.getElementById("typeAdrView").value = adresses[i-1].type_adresse;
    document.getElementById("numVoieView").value = adresses[i-1].num_voie;
    document.getElementById("voieView").value = adresses[i-1].voie;
    document.getElementById("villeView").value = adresses[i-1].ville;
    document.getElementById("zipView").value = adresses[i-1].code_postal;
    document.getElementById("paysView").value = adresses[i-1].pays;
}

function closeOverlay(nbTel, nbAdr) {
    //document.getElementById("overlayViewClient").style.display = "none";
    console.log("close");
    clearOverlay(nbTel, nbAdr);
}

function clearOverlay(nbTel, nbAdr) {  // clear all the added elements (phones, addresses, etc...)
    document.getElementById("closeButtonViewClient").removeEventListener("click", closeOverlay);   // remove previous event
    console.log("clear");
    console.log(nbTel);
    console.log(nbAdr);
    if (nbTel > 1) {
        for (let i = 1; i < nbTel; i++) {
            document.getElementById("tel" + i).remove();
        }
    }
    if (nbAdr > 1) {
        for (let i = 1; i < nbAdr; i++) {
            document.getElementById("adrView" + (i+1)).remove();
        }
    }
}