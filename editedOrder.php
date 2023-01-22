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
            $sql = "INSERT INTO commande_produit (id_commande, id_produit, quantite)   
                    VALUES ('$id', '$product', '$q')";  // Insert product in order
            if ($conn->query($sql) === TRUE) {
                echo "Product added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $i++;
        }
        else {
            $isProduct = false;
        }
    }

    $sql = "SELECT SUM(produit.prix_produit * commande_produit.quantite) FROM produit, commande_produit WHERE produit.id_produit = commande_produit.id_produit AND commande_produit.id_commande = '$id'"; // Get total amount
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