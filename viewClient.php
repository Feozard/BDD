<!-- Overlay View Client -->
<div id="overlayViewClient">
    <div class="fidelity">
    <p class="subtitle">Fidélité</p>
    <div class="fidelityBox box">
        <p class="subtitle">Niveau</p>
        <input id="levelView" class="itemFormFidelity" type="text" readonly> 
        <p class="subtitle">Points</p>
        <input id="nbPointsView" class="itemFormFidelity" type="number" readonly>
    </div>
    </div>

    <div class="formClient">
    <button class="closeButton" id="closeButtonViewClient"></button>
    <p class="subtitle">Identité</p>
    <div class="formBox box">
        <div class="blockInfo">
        <p class="subtitle">ID</p>
        <input id="id_clientView" class="itemForm" type="text" readonly>
        </div>
        <div class="blockInfo">
        <p class="subtitle">Nom</p>
        <input id="lastNameView" class="itemForm" type="text" readonly>
        <p class="subtitle secondItem">Prénom</p>
        <input id="firstNameView" class="itemForm" type="text" readonly>
        </div>
    </div>

    <br />
    <p class="subtitle">Coordonnées</p>
    <div class="formBox box">
        <div id="telBoxView" class="telBox">
        <div class="blockInfo" id="tel0">
            <p class="subtitle" id="telNumView0">Tél.</p>
            <input id="codePhoneView0" class="itemForm code_region" type="text" readonly>
            <input id="phoneView0" class="itemForm" type="tel" readonly>
        </div>
        </div>
        <div class="blockInfo">
        <p class="subtitle">Mail</p>
        <input id="mailView" class="itemForm" readonly>
        </div>
        <div class="blockInfo">
        <p class="subtitle">Facebook</p>
        <input id="facebookView" class="itemForm" readonly>
        <p class="subtitle secondItem">Instagram</p>
        <input id="instagramView" class="itemForm" readonly>
        </div>
    </div>

    <br />
    <p class="subtitle">Adresse(s)</p>
    <div class="onglets" id="ongletsAdrView">
        <button class="onglet" id="adrView1">Adr. 1</button>
    </div>
    <div class="formBox box">
        <div class="blockInfo">
            <p class="subtitle">Type</p>
            <input id="typeAdrView" class="itemForm" readonly>
        </div>
        <div class="blockInfo">
            <p class="subtitle">Num. Voie</p>
            <input id="numVoieView" class="itemForm" readonly>
        </div>
        <div class="blockInfo">
            <p class="subtitle">Voie</p>
            <input id="voieView" class="itemForm" readonly>
        </div>
        <div class="blockInfo">
            <p class="subtitle">Ville</p>
            <input id="villeView" class="itemForm" readonly>
        </div>
        <div class="blockInfo">
            <p class="subtitle">Code postal</p>
            <input id="zipView" class="itemForm" readonly>
            <p class="subtitle secondItem">Pays</p>
            <input id="paysView" class="itemForm" readonly>
        </div>
    </div>
    </div>
</div>