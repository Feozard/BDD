<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BDD</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./Phone/build/css/intlTelInput.css">
    <script type ="module" src="./Scripts/index.js" defer></script>
    <script type ="module" src="./Scripts/addClient.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota+Text:wght@300;700&display=swap" rel="stylesheet">
    <!-- <link rel="icon" href="./favicon.ico" type="image/x-icon"> -->
  </head>

  <body>
    <!-- Connection to the database -->
    <?php
      $hostName = "localhost";
      $userName = "root";
      $password = "";
      $dbName = "BDD";
      $conn = new mysqli($hostName, $userName, $password, $dbName);
    ?> 

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
    
    <div id="listBox" class="box">
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

      <!-- Get client info -->
      <?php
        $sql = "SELECT DISTINCT * FROM client ORDER BY id_client DESC"; 
        $infos = $conn->query($sql);
        $i = 0;
       ?>
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
          <!-- Display client info -->
          <?php
            while($info = $infos->fetch_assoc()) {
              $i++;
              $sql = "SELECT * FROM adresse WHERE id_client = '".$info["id_client"]."'"; // Get addresses
              $adresses = $conn->query($sql);
              $arrayAdr = [];
              while($adr = $adresses->fetch_assoc()) {  // Table of addresses
                array_push($arrayAdr, $adr);
              }
              $adresses = $conn->query($sql); // To do another fetch_assoc later

              $sql = "SELECT * FROM telephone WHERE id_client = '".$info["id_client"]."'"; // Get phone numbers
              $nums = $conn->query($sql);
              $arrayNum = [];
              while($num = $nums->fetch_assoc()) {  // Table of phone numbers
                array_push($arrayNum, $num);
              }
              $nums = $conn->query($sql); // To do another fetch_assoc later
              
              $sql = "SELECT * FROM points WHERE id_client = '".$info["id_client"]."'"; // Get points
              $points = $conn->query($sql);

              $sql = "SELECT SUM(nb_points) FROM points WHERE id_client = '".$info["id_client"]."'"; // Get sum of points
              $som_point = $conn->query($sql);
              $nb_point = $som_point->fetch_assoc()["SUM(nb_points)"];
              if (empty($nb_point)) { // If clients has no points
                $nb_point = 0;
              }

              echo "<tr>";
              echo "<td class='elementTbody' id='click_id_client".$i."'><b>".$info["id_client"]."</b></td>";
              ?>

              <script src="./Scripts/viewClient.js"></script>
              <script type="text/javascript">
                document.getElementById("click_id_client" + <?php echo $i; ?>).style.cursor = 'pointer';


                document.getElementById("click_id_client" + <?php echo $i; ?>).addEventListener("click", () => {
                  viewClient(<?php echo json_encode($info); ?>,
                  <?php echo json_encode($arrayNum); ?>,
                  <?php echo json_encode($arrayAdr); ?>,
                  <?php echo json_encode($points); ?>,
                  <?php echo $nb_point; ?>)
                });
              </script>

          <?php
              echo "<td class='elementTbody'>".$info["prenom_client"]." ".$info["nom_client"]."</td>";
              echo "<td class='elementTbody'>".$info["fb"]."</td>";
              echo "<td class='elementTbody'>".$info["insta"]."</td>";
              echo "<td class='elementTbody'>".$info["mail"]."</td>";

              // Addresses
              $adressesStr = '';
              while($adresse = $adresses->fetch_assoc()) {  // List of addresses
                $adressesStr .= $adresse["num_voie"].", ".$adresse["voie"]." - ".$adresse["code_postal"]." ".$adresse["ville"]." - ".$adresse["pays"]."<br>";
              }
              echo "<td class='elementTbody'>".$adressesStr."</td>"; // Display list of addresses

              // Phones
              $numsStr = '';
              while($num = $nums->fetch_assoc()) {  // List of phone numbers
                
                $numsStr .= $num["num_telephone"]."<br>";
              }
              echo "<td class='elementTbody'>".$numsStr."</td>"; // Display list of phone numbers

              echo "<td class='elementTbody'>".$info["membership"]."</td>";

              // Points
              echo "<td class='elementTbody'>".$nb_point."</td>"; // Display sum of points

              echo "</tr>";
            }
          ?> 
        </tbody>
      </table>
    </div>

    <?php
			include 'addClient.php';
      include 'viewClient.php';
      include 'addOrder.php';
		?>
  </body>
</html>