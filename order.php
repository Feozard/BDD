<script type="module" src="./Scripts/viewClient.js" defer></script>
<script type="module" src="./Scripts/addOrder.js" defer></script>

<div id="searchBoxOrder" class="box searchBox">
    <p id="searchTitle" class="titleSection">
        <img src="Icons/search.svg" alt="search icon" class="icon">
        Rechercher une commande
    </p>
    <form action="./index.php?tab=Order" method="post" class="formSearch">
        <input type="text" name="searchOrder" id="searchBar" placeholder="Rechercher">
        <input type="submit" value="Rechercher" id="searchButton" style="display: none">
    </form>
</div>

<div id="listBoxOrder" class="box listBox">
    <div class="listTitleDiv">
        <p id="listTitle" class="titleSection">
            <img src="Icons/list.svg" alt="list icon" class="icon">
            Liste des commandes
        </p>
        <p id="addTitleOrder" class="titleSection clickableTitle">
            <img src="Icons/add.svg" alt="add icon" class="icon">
            Ajouter une commande
        </p>
        <p id="exportTitle" class="titleSection clickableTitle">
            <img src="Icons/export.svg" alt="export icon" class="icon">
            Exporter les commandes
        </p>   
    </div>

    <!-- Get order info -->
    <?php
    if (isset($_POST['searchOrder'])) { ?>
        <?php $search = $_POST['searchOrder']; // Get the search value with POST method
        $sql = "SELECT * FROM commande WHERE id_commande LIKE '%$search%' OR id_client LIKE '%$search%' ORDER BY date_commande DESC"; // Search in the database
        $infos = $conn->query($sql);
        if ($infos->num_rows == 0) { // If there is no result
            echo "0 results";
        }
    }
    else {
        $sql = "SELECT DISTINCT * FROM commande ORDER BY date_commande DESC"; 
        $infos = $conn->query($sql);
    }
    $i = 0;
    ?>
    <table class="listClient">
    <thead>
        <tr>
        <th class="elementThead">ID</th>
        <th class="elementThead">ID Client</th>
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
            $sql = "SELECT * FROM adresse WHERE type_adresse = 'Livraison' AND id_client = '".$info["id_client"]."'"; // Get addresses
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

            $sql = "SELECT SUM(nb_points) FROM points WHERE id_client = '".$info["id_client"]."'"; // Get sum of points
            $som_point = $conn->query($sql);
            $nb_point = $som_point->fetch_assoc()["SUM(nb_points)"];
            if (empty($nb_point)) { // If clients has no points
                $nb_point = 0;
            }

            echo "<tr>";
            echo "<td class='elementTbody' id='click_id_order".$i."'>".$info["id_commande"]."</td>";
            echo "<td class='elementTbody' id='click_id_client2".$i."'>".$info["id_client"]."</td>";

            $sql = "SELECT * FROM adresse WHERE type_adresse = 'Livraison' AND id_client = '".$info["id_client"]."' LIMIT 1";
            $addresse = $conn->query($sql);
            $adr = $addresse->fetch_assoc();
            $addresse = $conn->query($sql); // To do another fetch_assoc later

            $sql ="SELECT * FROM mode_paiement";
            $mode_paiement = $conn->query($sql);
            $mode_paiement = $mode_paiement->fetch_all(MYSQLI_ASSOC);

            $sql = "SELECT * FROM paiement WHERE id_commande = '".$info["id_commande"]."'";
            $paiements = $conn->query($sql);
            $paiements = $paiements->fetch_all(MYSQLI_ASSOC);

            $sql = "SELECT DISTINCT * FROM commande_produit WHERE id_commande = '".$info["id_commande"]."'";
            $productsInOrder = $conn->query($sql);
            $productsInOrder = $productsInOrder->fetch_all(MYSQLI_ASSOC);

            $sql = "SELECT * FROM produit";
            $products = $conn->query($sql);
            $products = $products->fetch_all(MYSQLI_ASSOC);
            ?>

            <script src="./Scripts/viewOrder.js"></script>
            <script type="text/javascript">
                document.getElementById("click_id_order" + <?php echo $i; ?>).style.cursor = 'pointer';

                document.getElementById("click_id_order" + <?php echo $i; ?>).addEventListener("click", () => {
                    viewOrder(<?php echo json_encode($info); ?>,
                    <?php echo json_encode($adr); ?>,
                    <?php echo json_encode($client); ?>,
                    <?php echo json_encode($productsInOrder); ?>,
                    <?php echo json_encode($products); ?>,
                    <?php echo json_encode($paiements); ?>,
                    <?php echo json_encode($mode_paiement); ?>
                    )
                });
            </script>

        <?php
            echo "<td class='elementTbody'>".$info["date_commande"]."</td>";

            // Addresses
            if ($addresse->num_rows == 0) { // If there is no address
                echo "<td class='elementTbody'>Aucune adresse de livraison</td>";
            }
            else {
                $adr = $addresse->fetch_assoc();
                $adresseStr = $adr["num_voie"].", ".$adr["voie"]." - ".$adr["code_postal"]." ".$adr["ville"]." - ".$adr["pays"];
                echo "<td class='elementTbody'>".$adresseStr."</td>"; // Display addresse
            }

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
    include './addOrder.php';
    include './viewOrder.php';
?>