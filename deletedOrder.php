<?php
    include 'index.php';
    $id = $_GET["id"];
    $sql = "DELETE FROM commande WHERE id_commande = '".$id."'"; // Delete order
    $result = mysqli_query($conn, $sql);
    $sql = "DELETE FROM commande_produit WHERE id_commande = '".$id."'";
    $result2 = mysqli_query($conn, $sql);
    if ($result && $result2) {
        echo "<script>alert('Commande supprimée !');</script>";
        echo "<script>window.location.href = 'index.php?tab=Order';</script>";
    } else {
        echo "<script>alert('Erreur lors de la suppression de la commande !');</script>";
        echo "<script>window.location.href = 'index.php?tab=Order';</script>";
    }
?>