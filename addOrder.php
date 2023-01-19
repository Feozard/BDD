<!-- Overlay Add Order -->
<div id="overlayAddOrder">
    <div class="formOrder">
    <button class="closeButton" id="closeButtonOrder"></button>

    <p class="subtitle">Informations</p>
    <div class="formBox box">
        <div class="blockInfo">
        <p class="subtitle">ID</p>
        <input id="id_order" class="itemForm" placeholder="ID" type="text" readonly>
        <p class="subtitle secondItem">Date</p>
        <input id="date" class="itemForm" type="date">
        <script type="text/javascript">
            document.getElementById("date").placeholder = new Date().toLocaleDateString();
        </script>
        <p class="subtitle secondItem">Statut</p>
        <select id="dropdownStatus" class="itemForm">
            <option value="à payer">À payer</option>
            <option value="payée">Payée</option>
            <option value="empaqueté">Empaquetée</option>
            <option value="envoyée">Envoyée</option>
            <option value="livrée">Livrée</option>
            <option value="terminée">Terminée</option>
        </select>
        </div>
        <div class="blockInfo">
        <p class="subtitle">ID Client</p>
        <input id="id_client_order" class="itemForm" placeholder="ID" type="text">
        <p class="subtitle secondItem">Nom client</p>
        <input id="name_client_order" class="itemForm" placeholder="Marie Martin" type="text" readonly>
        </div>
    </div>

    <div class="blockFormBox">
        <div class="paiementBox">
        <br />
        <p class="subtitle">Paiement</p>
        <div class="onglets" id="ongletsPaiement">
            <button class="onglet" id="paiement1">P1</button>
            <button class="onglet addOnglet" id="addPaiement"></button>
        </div>
        <div class="formBox box">
            <div class="blockInfo">
            <p class="subtitle">Type</p>
            <?php
                $sql = "SELECT nom_mode_paiement FROM mode_paiement ORDER BY nom_mode_paiement ASC";
                $result = $conn->query($sql);
            ?> <!-- Récupération des modes de paiement -->
            <select id="dropdownPaiement" class="itemForm">
            <?php
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" .$row["nom_mode_paiement"]. "'>" .$row["nom_mode_paiement"]. "</option>";
                }
            ?> <!-- Affichage des modes de paiement -->
            </select>
            </div>
            <div class="blockInfo">
            <p class="subtitle">Montant</p>
            <input id="montant" class="itemForm" type="number" placeholder="100">
            </div>
            <div class="blockInfo">
            <p class="subtitle">Date</p>
            <input id="datePaiement" class="itemForm" type="date">
            <script type="text/javascript">
                document.getElementById("datePaiement").placeholder = new Date().toLocaleDateString();
            </script>
            </div>
        </div>
        </div>

        <div class="productsBox">
        <br />
        <p class="subtitle">Articles</p>
        <div class="onglets">
            <button id="addProduct" class="ongletProduct onglet addOnglet"></button>
        </div>
        <div class="formBox box">
            Ajouter des articles...
        </div>
        </div>
    </div>
    
    

    
    </div>
</div>