<div id="searchBoxOrder" class="box searchBox">
    <p id="searchTitle" class="titleSection">
        <img src="Icons/search.svg" alt="search icon" class="icon">
        Rechercher une commande
    </p>
    <form action="./index.php" method="post" class="formSearch">
    <input type="text" name="searchClient" id="searchBar" placeholder="Rechercher">
    <input type="submit" value="Rechercher" id="searchButton" style="display: none">
    </form>
</div>

<div id="listBoxOrder" class="box listBox">
    <div class="listTitleDiv">
        <p id="listTitle" class="titleSection">
            <img src="Icons/list.svg" alt="list icon" class="icon">
            Liste des commandes
        </p>
        <p id="addTitle" class="titleSection clickableTitle" onclick="addOrder()">
            <img src="Icons/add.svg" alt="add icon" class="icon">
            Ajouter une commande
        </p>
        <p id="exportTitle" class="titleSection clickableTitle" onclick="exportOrder()">
            <img src="Icons/export.svg" alt="export icon" class="icon">
            Exporter les commandes
        </p>
    </div>

    <!-- Get order info -->
    <?php
    if (isset($_POST['searchOrder'])) {
        $search = $_POST['searchOrder']; // Get the search value with POST method
        $sql = "SELECT * FROM client WHERE id_client LIKE '%$search%' OR nom_client LIKE '%$search%' OR prenom_client LIKE '%$search%' ORDER BY id_client DESC"; // Search in the database
        $infos = $conn->query($sql);
        if ($infos->num_rows == 0) { // If there is no result
            echo "0 results";
        }
    }
    else {
        $sql = "SELECT DISTINCT * FROM commande ORDER BY id_commande DESC"; 
        $infos = $conn->query($sql);
    }
    $i = 0;
    ?>
    <table class="listClient">
    <thead>
        <tr>
        <th class="elementThead">ID</th>
        <th class="elementThead">Id Client</th>
        <th class="elementThead">Date</th>
        <th class="elementThead">Adresse(s)</th>
        <th class="elementThead">Téléphone(s)</th>
        <th class="elementThead">Statut</th>
        <th class="elementThead">Notes</th>
        </tr>
    </thead>
    <tbody id="listOrder">
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

            $sql = "SELECT * FROM client WHERE id_client = '".$info["id_client"]."'"; // Get client info
            $client = $conn->query($sql)->fetch_assoc();

            $sql = "SELECT * FROM points WHERE id_client = '".$info["id_client"]."'"; // Get points
            $points = $conn->query($sql)->fetch_assoc();

            echo "<tr>";
            echo "<td class='elementTbody' id='click_id_order".$i."'>".$info["id_commande"]."</td>";
            echo "<td class='elementTbody' id='click_id_client2".$i."'>".$info["id_client"]."</td>";
            ?>

            <script src="./Scripts/viewOrder.js"></script>
            <script src="./Scripts/viewClient.js"></script>
            <script type="text/javascript">
                document.getElementById("click_id_order" + <?php echo $i; ?>).style.cursor = 'pointer';
                document.getElementById("click_id_client2" + <?php echo $i; ?>).style.cursor = 'pointer';


                document.getElementById("click_id_client2" + <?php echo $i; ?>).addEventListener("click", () => {
                    viewClient(<?php echo json_encode($client); ?>,
                    <?php echo json_encode($arrayNum); ?>,
                    <?php echo json_encode($arrayAdr); ?>,
                    <?php echo json_encode($points); ?>,
                    <?php echo $nb_point; ?>)
                });

                // set call function for view order
            </script>

        <?php
            echo "<td class='elementTbody'>".$info["date_commande"]."</td>";

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

            echo "<td class='elementTbody'>".$info["statut_commande"]."</td>";
            echo "<td class='elementTbody'>".$info["note"]."</td>";

            echo "</tr>";
        }
        ?>
    </tbody>
    </table>
</div>

<?php
    // include './addClient.php';
    // include './viewClient.php';
    // include './addOrder.php';
?>