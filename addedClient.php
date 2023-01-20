<!-- Add Client -->
<?php
    include 'index.php';
    $id = $_POST['id_client']; // Get the value of the inputs with POST method
    $lastName = $_POST['lastName']; 
    $firstName = $_POST['firstName'];
    $mail = $_POST['mail'];
    $facebook = $_POST['fb'];
    $instagram = $_POST['insta'];
    $membership = $_POST['membership'];

    // tel
    $codeTel = [];
    $numTel = [];

    $i = 1;
    $isTel = true;
    while ($isTel) {
        if (isset($_POST['codeTel'.$i])) {
            echo "<script type='text/javascript'>console.log('tel');</script>";
            array_push($codeTel, intval($_POST['codeTel'.$i]));
            array_push($numTel, $_POST['numTel'.$i]);
            $i++;
        }
        else {
            $isTel = false;
        }
    }
?>

<?php
    // insert into client
    echo "<script type='text/javascript'>console.log('insert client');</script>";
    $sql = "INSERT INTO client (id_client, nom_client, prenom_client, fb, insta, mail, membership)
            VALUES ('$id', '$lastName', '$firstName', '$facebook', '$instagram', '$mail', '$membership')"; // Insert the values into the database
    $conn->query($sql);

    //insert into telephone
    echo "<script type='text/javascript'>console.log('insert phones');</script>";
    for ($i = 0; $i < count($codeTel); $i++) {
        $sql = "INSERT INTO telephone (id_client, code_region, num_telephone)
                VALUES ('$id', $codeTel[$i], '$numTel[$i]')";
        $conn->query($sql);
    }
    // gérer adresses
    // gérer fidélité
?>

<script type="text/javascript">
    window.location = "index.php";
</script>