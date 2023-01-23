var nbTel = 1;  // number of tel inputs
var nbAdr = 1;  // number of address inputs

document.getElementById("addTitleClient").addEventListener("click", addClient);    // open overlay
document.getElementById("closeButtonClient").addEventListener("click", closeOverlay);    // close overlay

function addClient() {  // open overlay
    document.getElementById("overlayAddClient").style.display = "flex";
    document.getElementById("overlayAddClient").style.flexDirection = "row";
}

function closeOverlay() { // close overlay
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
            document.getElementById("numVoie" + i).style.display = "block";
            document.getElementById("voie" + i).style.display = "block";
            document.getElementById("ville" + i).style.display = "block";
            document.getElementById("zip" + i).style.display = "block";
            document.getElementById("pays" + i).style.display = "block";
        }
        else {
            if (document.getElementById("adr" + i) != null) { // this address exists
                document.getElementById("adr" + i).style.backgroundColor = "#B4B4B4";    // unselect previous address
                document.getElementById("dropdownAdr" + i).type = "hidden"; // hide previous address
                document.getElementById("numVoie" + i).type = "hidden";
                document.getElementById("voie" + i).type = "hidden";
                document.getElementById("ville" + i).type = "hidden";
                document.getElementById("zip" + i).type = "hidden";
                document.getElementById("pays" + i).type = "hidden";
            }
            else { // this address doesn't exist
                isAdr = false;
            }
        }
        i++;
    }
}