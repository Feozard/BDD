<!-- Overlay Add Client -->
<div id="overlayAddClient">
    <form id="formAddClient" method="post" name="createClient" action="addedClient.php">
        <div class="fidelity">
            <p class="subtitle">Fidélité</p>
            <div class="fidelityBox box">
                <p class="subtitle">Niveau</p>
                <select id="dropdownLevel" class="itemFormFidelity" name="membership">
                <option value="-">-</option>
                <option value="Silver">Silver</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
                <option value="Ultimate">Ultimate</option>
                </select>
                <p class="subtitle">Points</p>
                <input id="nbPoints" class="itemFormFidelity" placeholder="0" type="number" name="points">
            </div>
        </div>

        <div class="formClient">
            <button class="closeButton" id="closeButtonClient" type="button"></button>
            <p class="subtitle">Identité</p>
            <div class="formBox box">
                <div class="blockInfo">
                <p class="subtitle">ID</p>
                <!-- ID creation -->
                <script type="text/javascript">
                    document.getElementById("addTitle").addEventListener("click", generateID); 
                    function generateID() {
                        var ID = "";
                        ID = ID.concat(new Date().getFullYear().toString().substr(2, 3)); // Add year
                        ID = ID.concat("-");

                        // Get last ID used
                        <?php
                            $sql = "SELECT * FROM client ORDER BY id_client DESC LIMIT 1"; // Getting last ID used
                            $lastID = $conn->query($sql);
                            $lastID = $lastID->fetch_assoc();
                        ?>
                        var lastID = "<?php echo $lastID['id_client']; ?>";
                        lastID = lastID.substr(3, lastID.length-1);
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
                        document.getElementById("id_client").value = ID; // Display ID value
                    }
                </script>
                <input id="id_client" class="itemForm" type="text" name="id_client" readonly>
                </div>
                <div class="blockInfo">
                <p class="subtitle">Nom</p>
                <input id="lastName" class="itemForm" placeholder="Martin" type="text" name="lastName" required>
                <p class="subtitle secondItem">Prénom</p>
                <input id="firstName" class="itemForm" placeholder="Marie" type="text" name="firstName" required>
                </div>
            </div>

            <br />
            <p class="subtitle">Coordonnées</p>
            <div class="formBox box">
                <div id="telBox" class="telBox">
                <div class="blockInfo">
                    <p class="subtitle" id="telNum1">Tél.</p>
                    <!-- <input id="phone" type="tel">
                    <script src="./Phone/build/js/intlTelInput.js"></script>
                    <script>
                    var input = document.querySelector("#phone");
                    window.intlTelInput(input, {
                        // any initialisation options go here
                    });
                    </script> -->
                    <select id="dropdownTel" class="itemForm" name="codeTel1" type="number" required>
                        <option value="33">+33</option>
                        <option value="0">autre</option>
                    </select>
                    <input id="phone" class="itemForm" placeholder="06 12 34 56 78" type="tel" name="numTel1" required>
                    <button id="addTel" class="itemForm"></button>
                </div>
                </div>
                <div class="blockInfo">
                <p class="subtitle">Mail</p>
                <input id="mail" class="itemForm" placeholder="marie.martin@hotmail.fr" name="mail">
                </div>
                <div class="blockInfo">
                <p class="subtitle">Facebook</p>
                <input id="facebook" class="itemForm" placeholder="fb.1234" name="fb">
                <p class="subtitle secondItem">Instagram</p>
                <input id="instagram" class="itemForm" placeholder="insta.1234" name="insta">
                </div>
            </div>

            <br />
            <!-- /!\ Gérer les adresses /!\ -->
            <p class="subtitle">Adresse(s)</p>
            <div class="onglets" id="ongletsAdr">
                <button class="onglet" id="adr1" type="button">Adr. 1</button>
                <button class="onglet addOnglet" id="addAdr" type="button"></button>
            </div>
            <div class="formBox box">
                <div class="blockInfo" id="dropDownDiv">
                    <p class="subtitle">Type</p>
                    <select id="dropdownAdr1" class="itemForm" name="type1">
                        <option value="Facturation">Facturation</option>
                        <option value="Livraison">Livraison</option>
                    </select>
                </div>
                <div class="blockInfo" id="numVoieDiv">
                    <p class="subtitle">Num. Voie</p>
                    <input id="numVoie1" class="itemForm" placeholder="1" name="numVoie1">
                </div>
                <div class="blockInfo" id="voieDiv">
                    <p class="subtitle">Voie</p>
                    <input id="voie1" class="itemForm" placeholder="Rue de la Paix" name="voie1">
                </div>
                <div class="blockInfo" id="villeDiv">
                    <p class="subtitle">Ville</p>
                    <input id="ville1" class="itemForm" placeholder="Paris" name="ville1">
                </div>
                <div class="blockInfo" id="zipDiv">
                    <p class="subtitle">Code postal</p>
                    <input id="zip1" class="itemForm" placeholder="75000" name="zip1" style="order: 1">
                    <p class="subtitle secondItem" id="countrySubtitle" style="order: 2">Pays</p>
                    <input id="pays1" class="itemForm" placeholder="France" name="pays1" style="order: 3">
                </div>
            </div>
            <input type="submit" value="Submit" class="validateButton">
        </div>
    </form>
</div>