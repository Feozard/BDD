<!-- Overlay Add Order -->
<div id="overlayAddOrder">
    <form id="formAddOrder" method="post" name="createOrder" action="addedOrder.php">
        <div class="formOrder">
            <button class="closeButton" id="closeButtonOrder" type="button"></button>

            <p class="subtitle">Informations</p>
            <div class="formBox box">
                <div class="blockInfo">
                    <p class="subtitle">ID</p>
                    <script type="text/javascript">
                        document.getElementById("addTitleOrder").addEventListener("click", generateID); 
                        function generateID() {
                            var ID = "";
                            ID = ID.concat(new Date().getFullYear().toString().substr(2, 3)); // Add year
                            ID = ID.concat("-ODR-");

                            // Get last ID used
                            <?php
                                $sql = "SELECT * FROM commande ORDER BY id_client DESC LIMIT 1"; // Getting last ID used
                                $lastID = $conn->query($sql);
                                $lastID = $lastID->fetch_assoc();
                            ?>
                            var lastID = "<?php echo $lastID['id_client']; ?>";
                            lastID = lastID.substr(7, lastID.length-1);
                            lastID = parseInt(lastID);
                            endNewID = lastID + 1;
                            endNewID = endNewID.toString();
                            if (endNewID.length == 1) {
                                endNewID = "000".concat(endNewID);
                            }
                            else if (endNewID.length == 2) {
                                endNewID = "00".concat(endNewID);
                            }
                            else if (endNewID.length == 3) {
                                endNewID = "0".concat(endNewID);
                            }

                            ID = ID.concat(endNewID);
                            document.getElementById("id_order").value = ID; // Display ID value
                        }
                    </script>
                    <input id="id_order" class="itemForm" placeholder="ID" type="text" name="id_order" readonly>
                    <p class="subtitle secondItem">Date</p>
                    <input id="date" class="itemForm" type="date" name="date_order" required>
                </div>

                <div class="blockInfo">
                    <p class="subtitle">ID Client</p>
                    <select id="dropdownClient" class="itemForm" name="id_client">
                        <?php
                            $sql = "SELECT id_client, nom_client, prenom_client FROM client ORDER BY id_client ASC";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" .$row["id_client"]. "'>".$row["id_client"]." - ".$row["prenom_client"]." ".$row["nom_client"]."</option>";
                            }
                        ?>
                    </select>
                    <!-- <p class="subtitle secondItem">Nom client</p>
                    <input id="name_client_order" class="itemForm" type="text" readonly> -->
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

            <!-- <div class="blockFormBox">
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
                        <?php
                            $sql = "SELECT nom_mode_paiement FROM mode_paiement ORDER BY nom_mode_paiement ASC";
                            $result = $conn->query($sql);
                        ?>
                        <select id="dropdownPaiement" class="itemForm">
                        <?php
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" .$row["nom_mode_paiement"]. "'>" .$row["nom_mode_paiement"]. "</option>";
                            }
                        ?>
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
            </div> -->

            <!-- <br />
            <p class="subtitle">Articles</p>
            <div class="onglets">
                <button id="addProduct" class="ongletProduct onglet addOnglet" type="button"></button>
            </div>
            <div class="formBox box">
                Ajouter des articles...
            </div> -->
            <input type="submit" value="Submit" class="validateButton">
        </div>
    </form>
</div>