<?php
    include 'index.php';
    $id = $_GET["id"];
    $sql = "DELETE FROM commande WHERE id_commande = '".$id."'"; // Delete order
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Commande supprimée !');</script>";
        echo "<script>window.location.href = 'index.php?tab=Order';</script>";
    } else {
        echo "<script>alert('Erreur lors de la suppression de la commande !');</script>";
        echo "<script>window.location.href = 'index.php?tab=Order';</script>";
    }
?>