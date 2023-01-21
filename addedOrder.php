<?php
    include 'index.php';
    $id = $_POST['id_order'];
    $id_client = $_POST['id_client'];
    $date = $_POST['date_order'];

    $sql = "INSERT INTO commande (id_commande, id_client, date_commande)
            VALUES ('$id', '$id_client', '$date')"; // Insert the values into the database
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>

<script type="text/javascript">
    window.location = "index.php?tab=Order";
</script>