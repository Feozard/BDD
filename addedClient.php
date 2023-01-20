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

    // phones
    $codeTel = [];
    $numTel = [];
    $i = 1;
    $isTel = true;
    while ($isTel) {
        if (isset($_POST['codeTel'.$i])) {
            array_push($codeTel, intval($_POST['codeTel'.$i]));
            array_push($numTel, $_POST['numTel'.$i]);
            $i++;
        }
        else {
            $isTel = false;
        }
    }

    // addresses
    $typeAdr = [];
    $numVoie = [];
    $voie = [];
    $ville = [];
    $codePostal = [];
    $pays = [];
    $i = 1;
    $isAdr = true;
    while ($isAdr) {
        if (isset($_POST['type'.$i])) {
            array_push($typeAdr, $_POST['type'.$i]);
            array_push($numVoie, intval($_POST['numVoie'.$i]));
            array_push($voie, $_POST['voie'.$i]);
            array_push($ville, $_POST['ville'.$i]);
            array_push($codePostal, intval($_POST['zip'.$i]));
            array_push($pays, $_POST['pays'.$i]);
            $i++;
        }
        else {
            $isAdr = false;
        }
    }
?>

<?php
    // insert into client
    $sql = "INSERT INTO client (id_client, nom_client, prenom_client, fb, insta, mail, membership)
            VALUES ('$id', '$lastName', '$firstName', '$facebook', '$instagram', '$mail', '$membership')"; // Insert the values into the database
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // insert into telephone
    for ($i = 0; $i < count($codeTel); $i++) {
        $sql = "INSERT INTO telephone (id_client, code_region, num_telephone)
                VALUES ('$id', $codeTel[$i], '$numTel[$i]')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }



    // insert into addresses
    for ($i = 0; $i < count($typeAdr); $i++) {
        echo $i;
        $sql = "INSERT INTO adresse (id_client, type_adresse, num_voie, voie, ville, code_postal, pays)
                VALUES ('$id', '$typeAdr[$i]', $numVoie[$i], '$voie[$i]', '$ville[$i]', $codePostal[$i], '$pays[$i]')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<script type="text/javascript">
    window.location = "index.php";
</script>