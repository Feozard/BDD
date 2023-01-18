function viewClient(info) {
    document.getElementById("overlayViewClient").style.display = "flex";
    document.getElementById("overlayViewClient").style.flexDirection = "row"; // open overlay

    document.getElementById("lastNameView").value = info.nom_client; // set value of input
    document.getElementById("firstNameView").value = info.prenom_client;
    document.getElementById("id_clientView").value = info.id_client;
    document.getElementById("codePhoneView").value = "+" + info.code_region;
    document.getElementById("phoneView").value = info.num_telephone; // jspa comment faire pour plusieurs telephone aled
    document.getElementById("mailView").value = info.mail;
    document.getElementById("facebookView").value = info.fb;
    document.getElementById("instagramView").value = info.insta;
    // gérer les adresses aled

    document.getElementById("closeButtonViewClient").addEventListener("click", closeOverlayViewClient);    // close overlay

}

function closeOverlayViewClient() {
    document.getElementById("overlayViewClient").style.display = "none";
}