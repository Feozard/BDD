function viewOrder(info_order, adr, info_client, products, info_products, paiements, mode_paiements) {
    console.log("viewOrder() called");
    document.getElementById("overlayViewOrder").style.display = "flex";
    document.getElementById("overlayViewOrder").style.flexDirection = "row"; // open overlay

    document.getElementById("id_orderView").value = info_order.id_commande;
    document.getElementById("dateView").value = info_order.date_commande;
    document.getElementById("statusView").value = info_order.statut_commande;
    document.getElementById("id_client_orderView").value = info_order.id_client;
    document.getElementById("name_client_orderView").value = info_client.nom_client + " " + info_client.prenom_client;
}