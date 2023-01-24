<!-- Overlay View Order -->
<div id="overlayViewOrder">
    <div class="formOrder" id="formOrder">
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
                <div class="onglets" id="ongletsPaiementView">
                    <button class="onglet" id="paiementView1" type="button">P1</button>
                </div>
                <div class="formBox box">
                    <div class="blockInfo">
                        <p class="subtitle">Type</p>
                        <input id="typePaiementView" class="itemForm" type="text" readonly>
                    </div>
                    <div class="blockInfo">
                        <p class="subtitle">Montant</p>
                        <input id="montantView" class="itemForm" type="text" readonly>
                    </div>
                    <div class="blockInfo">
                        <p class="subtitle">Date</p>
                        <input id="datePaiementView" class="itemForm" type="text" readonly>
                    </div>
                </div>
            </div>

            <div class="productsBox">
                <br />
                <p class="subtitle">Articles</p>
                <div class="formBox box" id="boxProductsView">
                    
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
                        <input id="adresseOrderView" class="itemForm" type="text" readonly>
                    </div>
                    <div class="blockInfo">
                        <p class="subtitle">Notes</p>
                        <input id="notesOrderView" class="itemForm" type="text" readonly>
                    </div>
                </div>
            </div>

            <div class="totalBox">
                <br />
                <p class="subtitle">Total</p>
                <div class="formBox box total">
                    <div class="blockInfo">
                        <p class="subtitle">Montant total</p>
                        <input id="totalOrderView" class="itemForm tot" type="text" readonly>
                    </div>
                </div>
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
                    <input id="id_orderEdit" class="itemForm" type="text" name="id_order" readonly>
                    <p class="subtitle secondItem">Date</p>
                    <input id="dateEdit" class="itemForm" type="text" readonly>
                    <p class="subtitle secondItem">Statut</p>
                    <select id="dropdownStatus" class="itemForm" name="status">
                        <option value="À payer">À payer</option>
                        <option value="Payé">Payé</option>
                        <option value="Empaqueté">Prêt</option>
                        <option value="Envoyé">Expédié</option>
                        <option value="Livré">Livré</option>
                        <option value="Terminé">Terminé</option>
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
                        <div class="blockInfo" id="typeDiv">
                            <p class="subtitle">Type</p>
                            <select id="typePaiement1" class="itemForm" name="typePaiement1">
                                <?php
                                    $sql = "SELECT * FROM mode_paiement";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id_mode_paiement'] . "'>" . $row['nom_mode_paiement'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="blockInfo" id="montantDiv">
                            <p class="subtitle">Montant</p>
                            <input id="montant1" class="itemForm" type="number" step="0.01" name="montant1" placeholder="0" min="0">
                        </div>
                        <div class="blockInfo" id="dateDiv">
                            <p class="subtitle">Date</p>
                            <input id="datePaiement1" class="itemForm" type="date" name="datePaiement1">
                        </div>
                    </div>
                </div>

                <div class="productsBox">
                    <br />
                    <p class="subtitle">Articles</p>
                    <div class="formBox box" id="boxProducts">
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
                            <input id="adresseOrder" class="itemForm" type="text">
                        </div>
                        <div class="blockInfo">
                            <p class="subtitle">Notes</p>
                            <input id="notesOrder" class="itemForm" type="text" name="notes">
                        </div>
                    </div>
                </div>

                <div class="totalBox">
                    <br />
                    <p class="subtitle">Total</p>
                    <div class="formBox box total">
                        <div class="blockInfo">
                            <p class="subtitle">Montant total</p>
                            <input id="totalOrder" class="itemForm tot" type="text" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Submit" class="validateButton">
        </div>
    </form>
</div>