<!-- Overlay View Order -->
<div id="overlayViewOrder">
    <div class="formOrder">
        <button class="closeButton" id="closeButtonViewOrder" type="button"></button>
        <p class="subtitle">Informations</p>
        <div class="formBox box">
            <div class="blockInfo">
                <p class="subtitle">ID</p>
                <input id="id_orderView" class="itemForm" type="text" readonly>
                <p class="subtitle secondItem">Date</p>
                <input id="dateView" class="itemForm" type="text" readonly>
                <p class="subtitle secondItem">Statut</p>
                <input id="statusView" class="itemForm" type="text" readonly>
            </div>

            <div class="blockInfo">
                <p class="subtitle">ID Client</p>
                <input id="id_client_orderView" class="itemForm" type="text" readonly>
                <p class="subtitle secondItem">Nom client</p>
                <input id="name_client_orderView" class="itemForm" type="text" readonly>
            </div>
        </div>

        <div class="blockFormBox">
            <div class="paiementBox">
                <br />
                <p class="subtitle">Paiement</p>
                <div class="onglets" id="ongletsPaiement">
                    <button class="onglet" id="paiement1" type="button">P1</button>
                    <button class="onglet addOnglet" id="addPaiement" type="button"></button>
                </div>
                <div class="formBox box">
                    <div class="blockInfo">
                        <p class="subtitle">Type</p>
                        <input id="typePaiement" class="itemForm" type="text" readonly>
                    </div>
                    <div class="blockInfo">
                        <p class="subtitle">Montant</p>
                        <input id="montant" class="itemForm" type="number" readonly>
                    </div>
                    <div class="blockInfo">
                        <p class="subtitle">Date</p>
                        <input id="datePaiement" class="itemForm" type="text" readonly>
                    </div>
                </div>
            </div>

            <div class="productsBox">
                <br />
                <p class="subtitle">Articles</p>
                <div class="formBox box" style="height:80%">
            
                </div>
            </div>
        </div>

        <div class="blockFormBox">
            <div class="deliveryBox">
                <br />
                <p class="subtitle">Livraison</p>
                <div class="formBox box">
                    <div class="blockInfo">
                        <p class="subtitle">Adresse</p>
                        <input id="adresseOrder" class="itemForm" type="textbox" readonly>
                    </div>
                    <div class="blockInfo">
                        <p class="subtitle">Notes</p>
                        <input id="notesOrder" class="itemForm" type="textbox" readonly>
                    </div>
                </div>
            </div>

            <div class="totalBox">
                <br />
                
            </div>
        </div>

        <button class="delButton" id="delButtonOrder" type="button"></button>
        <script type="text/javascript">
            document.getElementById("delButtonOrder").onclick = function () {
                if (confirm("Voulez-vous vraiment supprimer cette commande ?")) {
                    window.location.href = "deletedOrder.php?id=" + document.getElementById("id_orderView").value;
                }
            };
        </script>
        <button class="editButton" id="editButtonOrder" type="button"></button>
    </div>
</div>

<!-- Overlay Edit Order -->
<div id="overlayEditOrder">
    <form id="formEditOrder" method="post" name="editOrder" action="editedOrder.php">
        <div class="formOrder">
            <button class="closeButton" id="closeButtonEditOrder" type="button"></button>
            <p class="subtitle">Informations</p>
            <div class="formBox box">
                <div class="blockInfo">
                    <p class="subtitle">ID</p>
                    <input id="id_orderEdit" class="itemForm" type="text" readonly>
                    <p class="subtitle secondItem">Date</p>
                    <input id="dateEdit" class="itemForm" type="text" readonly>
                    <p class="subtitle secondItem">Statut</p>
                    <select id="dropdownStatus" class="itemForm" name="statut">
                        <option value="à payer">À payer</option>
                        <option value="payée">Payé</option>
                        <option value="empaqueté">Prêt</option>
                        <option value="envoyée">Expédié</option>
                        <option value="livrée">Livré</option>
                        <option value="terminée">Terminé</option>
                    </select>
                </div>

                <div class="blockInfo">
                    <p class="subtitle">ID Client</p>
                    <input id="id_client_orderEdit" class="itemForm" type="text" readonly>
                    <p class="subtitle secondItem">Nom client</p>
                    <input id="name_client_orderEdit" class="itemForm" type="text" readonly>
                </div>
            </div>

            <div class="blockFormBox">
                <div class="paiementBox">
                    <br />
                    <p class="subtitle">Paiement</p>
                    <div class="onglets" id="ongletsPaiement">
                        <button class="onglet" id="paiement1" type="button">P1</button>
                        <button class="onglet addOnglet" id="addPaiement" type="button"></button>
                    </div>
                    <div class="formBox box">
                        <div class="blockInfo">
                            <p class="subtitle">Type</p>
                            <input id="typePaiement" class="itemForm" type="text">
                        </div>
                        <div class="blockInfo">
                            <p class="subtitle">Montant</p>
                            <input id="montant" class="itemForm" type="number">
                        </div>
                        <div class="blockInfo">
                            <p class="subtitle">Date</p>
                            <input id="datePaiement" class="itemForm" type="text">
                        </div>
                    </div>
                </div>

                <div class="productsBox">
                    <br />
                    <p class="subtitle">Articles</p>
                    <div class="formBox box">
                        <div class="blockInfo">
                            <input type="number" class="itemForm n_product" id="n_product1" placeholder="0" min="0" name="n_product1"> 
                            <select id="dropdownProduct1" class="itemForm" name="product1">

                            </select>
                            <button id="addProduct" class="itemForm" type="button"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="blockFormBox">
                <div class="deliveryBox">
                    <br />
                    <p class="subtitle">Livraison</p>
                    <div class="formBox box">
                        <div class="blockInfo">
                            <p class="subtitle">Adresse</p>
                            <input id="adresseOrder" class="itemForm" type="textbox" readonly>
                        </div>
                        <div class="blockInfo">
                            <p class="subtitle">Notes</p>
                            <input id="notesOrder" class="itemForm" type="textbox" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Submit" class="validateButton">
        </div>
    </form>
</div>