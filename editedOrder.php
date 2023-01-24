<?php
    include 'index.php';
    $id = $_POST['id_order'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];

    $sql = "UPDATE commande SET statut_commande = '$status', note = '$notes' WHERE id_commande = '$id'"; // Insert the values into the database
    if ($conn->query($sql) === TRUE) {
        echo "Update successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $i = 1;
    $isProduct = true;
    while ($isProduct) {
        if (isset($_POST['n_product'.$i])) {
            $q = $_POST['n_product'.$i];
            $product = $_POST["product".$i];
            $sql = "SELECT * FROM commande_produit WHERE id_commande = '$id' AND id_produit = '$product'"; // Check if product is already in order
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $sql = "UPDATE commande_produit WHERE id_commande = '$id' AND id_produit = '$product' SET quantite = '$q'"; // Update product quantity
            }
            else {
                $sql = "INSERT INTO commande_produit (id_commande, id_produit, quantite)   
                    VALUES ('$id', '$product', '$q')";  // Insert product in order
                if ($conn->query($sql) === TRUE) {
                    echo "Product added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            $i++;
        }
        else {
            $isProduct = false;
        }
    }

    $i = 1;
    $isPaiement = true;
    while ($isPaiement) {
        if (isset($_POST['typePaiement'.$i]) && $_POST['montant'.$i] != 0) {
            $type = $_POST['typePaiement'.$i];
            $montant = $_POST['montant'.$i];
            $date = $_POST['datePaiement'.$i];
            $sql = "SELECT * FROM paiement WHERE id_commande = '$id' AND mode_paiement = '$type' AND montant_paiement= '$montant' AND date_paiement = '$date'"; // Check if payment is already in order
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                $sql = "INSERT INTO paiement(id_commande, montant_paiement, date_paiement, mode_paiement)
                    VALUES ('$id', '$montant', '$date', '$type')"; // Insert payment in database
                if ($conn->query($sql) === TRUE) {
                    echo "Payment added successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            $i++;
        }
        else {
            $isPaiement = false;
        }
    }

    $sql = "SELECT DISTINCT SUM(produit.prix_produit * commande_produit.quantite) FROM produit, commande_produit WHERE produit.id_produit = commande_produit.id_produit AND commande_produit.id_commande = '$id'"; // Get total amount
    $somme = $conn->query($sql);
    $somme = $somme->fetch_assoc()["SUM(produit.prix_produit * commande_produit.quantite)"];
    $sql = "UPDATE commande SET prix_commande = '$somme' WHERE id_commande = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Update successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>

<script type="text/javascript">
    window.location = "index.php?tab=Order";
</script>