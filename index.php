
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BDD</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./Phone/build/css/intlTelInput.css">
    <script type ="module" src="./index.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota+Text:wght@300;700&display=swap" rel="stylesheet">
    <!-- <link rel="icon" href="./favicon.ico" type="image/x-icon"> -->
  </head>

  <body>
    <?php
      $hostName = "localhost";
      $userName = "root";
      $password = "";
      $dbName = "BDD";
      $conn= new mysqli($hostName, $userName, $password, $dbName);
    ?> <!-- Connection to the database -->

    <div id="menu">
      <div class="submenu" id="clients"><span class="title">Clients</span></div>
      <div class="submenu" id="orders"><span class="title">Commandes</span></div>
    </div>

    <div id="searchBox" class="box">
      <p id="searchTitle" class="titleSection">
        <img src="Icons/search.svg" alt="search icon" class="icon">
        Rechercher un client
      </p>
      <input id="searchBar" placeholder="Rechercher" type="text">
    </div>
    
    <div class="listBox box">
      <div class="listTitleDiv">
        <p id="listTitle" class="titleSection">
          <img src="Icons/list.svg" alt="list icon" class="icon">
          Liste des clients
        </p>
        <p id="addTitle" class="titleSection">
          <img src="Icons/add.svg" alt="add icon" class="icon">
          Ajouter un client
        </p>
      </div>

      <?php
        $sql = "SELECT DISTINCT * FROM client INNER JOIN telephone ON client.id_client = telephone.id_client
        INNER JOIN adresse ON client.id_client = adresse.id_client ORDER BY client.id_client ASC";
        $result = $conn->query($sql);
       ?> <!-- Récupération des infos clients -->
      <table class="listClient">
        <thead>
          <tr>
            <th class="elementThead">ID</th>
            <th class="elementThead">Nom</th>
            <th class="elementThead">Facebook</th>
            <th class="elementThead">Instagram</th>
            <th class="elementThead">Mail</th>
            <th class="elementThead">Adresse</th>
            <th class="elementThead">Téléphone</th>
            <th class="elementThead">Niveau</th>
            <th class="elementThead">Points</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td class='elementTbody'>".$row["id_client"]."</td>";
              echo "<td class='elementTbody'>".$row["prenom_client"]." ".$row["nom_client"]."</td>";
              echo "<td class='elementTbody'>".$row["fb"]."</td>";
              echo "<td class='elementTbody'>".$row["insta"]."</td>";
              echo "<td class='elementTbody'>".$row["mail"]."</td>";
              echo "<td class='elementTbody'>".$row["num_voie"].", ".$row["voie"]." ".$row["code_postal"]." ".$row["pays"]."</td>";
              echo "<td class='elementTbody'>".$row["num_telephone"]."</td>";
              echo "<td class='elementTbody'>".$row["membership"]."</td>";
              $sql = "SELECT SUM(nb_points) FROM points WHERE id_client = '".$row["id_client"]."'";
              $result = $conn->query($sql);
              $nb_point = $result->fetch_assoc();
              echo "<td class='elementTbody'>".$nb_point["SUM(nb_points)"]."</td>";
              echo "</tr>";
            }
          ?>

        </tbody>
      </table>
    </div>

    <!-- Overlay Client -->
    <div id="overlayAddClient">
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
          <div id="telBox">
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
      </div>
    </div>

    <!-- Overlay Order -->
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
  </body>
</html>