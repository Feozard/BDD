<!-- Overlay View Order -->
<div id="overlayViewOrder">
    <div class="formOrder">
        <button class="closeButton" id="closeButtonOrder" type="button"></button>
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
                <!-- <p class="subtitle secondItem">Statut</p>
                <select id="dropdownStatus" class="itemForm" name="statut">
                    <option value="à payer">À payer</option>
                    <option value="payée">Payé</option>
                    <option value="empaqueté">Prêt</option>
                    <option value="envoyée">Expédié</option>
                    <option value="livrée">Livré</option>
                    <option value="terminée">Terminé</option>
                </select> -->
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

        <br />
        <p class="subtitle">Articles</p>
        <div class="formBox box">
            
        </div>
    </div>
</div>