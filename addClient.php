<!-- Overlay Add Client -->
<div id="overlayAddClient">
    <form id="formAddClient" method="post" name="createClient" action="index.php">
        <div class="fidelity">
            <p class="subtitle">Fidélité</p>
            <div class="fidelityBox box">
                <p class="subtitle">Niveau</p>
                <select id="dropdownLevel" class="itemFormFidelity">
                <option value="-">-</option>
                <option value="Silver">Silver</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
                <option value="Ultimate">Ultimate</option>
                </select>
                <p class="subtitle">Points</p>
                <input id="nbPoints" class="itemFormFidelity" placeholder="0" type="number">
            </div>
        </div>

        <div class="formClient">
            <button class="closeButton" id="closeButtonClient"></button>
            <p class="subtitle">Identité</p>
            <div class="formBox box">
                <div class="blockInfo">
                <p class="subtitle">ID</p>
                <input id="id_client" class="itemForm" placeholder="ID" type="text" readonly>
                </div>
                <div class="blockInfo">
                <p class="subtitle">Nom</p>
                <input id="lastName" class="itemForm" placeholder="Martin" type="text">
                <p class="subtitle secondItem">Prénom</p>
                <input id="firstName" class="itemForm" placeholder="Marie" type="text">
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
                    <select id="dropdownTel" class="itemForm">
                    <option value="+33">+33</option>
                    <option value="autre">autre</option>
                    </select>
                    <input id="phone" class="itemForm" placeholder="06 12 34 56 78" type="tel">
                    <button id="addTel" class="itemForm"></button>
                </div>
                </div>
                <div class="blockInfo">
                <p class="subtitle">Mail</p>
                <input id="mail" class="itemForm" placeholder="marie.martin@hotmail.fr">
                </div>
                <div class="blockInfo">
                <p class="subtitle">Facebook</p>
                <input id="facebook" class="itemForm" placeholder="fb.1234">
                <p class="subtitle secondItem">Instagram</p>
                <input id="instagram" class="itemForm" placeholder="insta.1234">
                </div>
            </div>

            <br />
            <p class="subtitle">Adresse(s)</p>
            <div class="onglets" id="ongletsAdr">
                <button class="onglet" id="adr1">Adr. 1</button>
                <button class="onglet addOnglet" id="addAdr"></button>
            </div>
            <div class="formBox box">
                <div class="blockInfo">
                <p class="subtitle">Type</p>
                <select id="dropdownAdr" class="itemForm">
                    <option value="facturation">Facturation</option>
                    <option value="livraison">Livraison</option>
                </select>
                </div>
                <div class="blockInfo">
                <p class="subtitle">Num. Voie</p>
                <input id="numVoie" class="itemForm" placeholder="1">
                </div>
                <div class="blockInfo">
                <p class="subtitle">Voie</p>
                <input id="voie" class="itemForm" placeholder="Rue de la Paix">
                </div>
                <div class="blockInfo">
                <p class="subtitle">Ville</p>
                <input id="ville" class="itemForm" placeholder="Paris">
                </div>
                <div class="blockInfo">
                <p class="subtitle">Code postal</p>
                <input id="zip" class="itemForm" placeholder="75000">
                <p class="subtitle secondItem">Pays</p>
                <input id="pays" class="itemForm" placeholder="France">
                </div>
            </div>
            <input type="submit" value="Submit" class="validateButton">
            <!-- <button class="validateButton" id="validateButtonClient"></button> -->
            <!-- <script src="./Scripts/addClient.js"></script>
            <script type="text/javascript">
                document.getElementById("validateButtonClient").addEventListener("click", createClient);
            </script> -->
        </div>
    </form>
</div>