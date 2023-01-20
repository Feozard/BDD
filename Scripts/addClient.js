var nbTel = 1;  // number of tel inputs
var nbAdr = 1;  // number of address inputs

document.getElementById("addTitle").addEventListener("click", addClient);    // open overlay
document.getElementById("closeButtonClient").addEventListener("click", closeOverlayClient);    // close overlay

function addClient() {  // open overlay
    generateID();   // generate a new ID
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
var currentAdr = 1; // current selected address (default: 1)
document.getElementById("adr1").addEventListener("click", () => {   // add function to select first address
    selectAdr(1);
});
document.getElementById("addAdr").addEventListener("click", addAdr);    // add function to add a new address input

function addAdr() {
    nbAdr++;    // increment number of address inputs
    document.getElementById("addAdr").remove();    // remove add button to avoid multiple add buttons
    var onglets = document.getElementById("ongletsAdr");

    var newAdr = document.createElement("button");
    newAdr.id = "adr" + nbAdr;
    newAdr.className = "onglet";
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
    
    selectAdr(nbAdr);
}

function selectAdr(n) {
    document.getElementById("adr" + currentAdr).style.backgroundColor = "#B4B4B4";    // unselect current address
    currentAdr = n;
    document.getElementById("adr" + currentAdr).style.backgroundColor = "white";    // select new address

    // remember to save info before changing address
    // clean address inputs
    document.getElementById("dropdownAdr").selectedIndex = "0";
    document.getElementById("numVoie").value = "";
    document.getElementById("voie").value = "";
    document.getElementById("ville").value = "";
    document.getElementById("zip").value = "";
    document.getElementById("pays").value = "";
}


