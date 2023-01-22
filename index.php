<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jellycat - Conciergerie</title>
    <link rel="stylesheet" href="./style.css">
    <script type="module" src="./Scripts/index.js" defer></script>
    <script type="module" src="./Scripts/viewOrder.js" defer></script>
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
    <script type="text/javascript">
      document.getElementById("clients").addEventListener("click", function() {
        window.location.href = "index.php?tab=Client";
      });
      document.getElementById("orders").addEventListener("click", function() {
        window.location.href = "index.php?tab=Order";
      });
    </script>

    <?php
      if (isset($_GET["tab"])) {
        $tab = $_GET["tab"];
        if (strcmp($tab, "Client") == 0) {  // client tab selected
          echo "<script>document.getElementById('clients').style.borderBottom = '4px solid #22333B';</script>";
          echo "<script>document.getElementById('orders').style.borderBottom = '4px solid transparent';</script>";
          include './client.php';
        }
        else if (strcmp($tab, "Order") == 0) { // order tab selected
          echo "<script>document.getElementById('orders').style.borderBottom = '4px solid #22333B';</script>";
          echo "<script>document.getElementById('clients').style.borderBottom = '4px solid transparent';</script>";
          include './order.php';
        }
      }
      else { // default value = client tab
        echo "<script>document.getElementById('clients').style.borderBottom = '4px solid #22333B';</script>";
        echo "<script>document.getElementById('orders').style.borderBottom = '4px solid transparent';</script>";
        include './client.php';
      }
    ?>
  </body>
</html>