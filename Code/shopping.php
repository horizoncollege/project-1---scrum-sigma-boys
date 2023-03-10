<?php

$host = 'localhost';
$db = 's168308_project';
$user = 'bit_academy';
$pass = 'bit_academy';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/shopping.css">
    <script src="javascript/Index.js"></script>
    <title>Sigma Media</title>
</head>

<body>

    <div class="topnav">
        <a href="index.php" class="active">Sigma media</a>
        <!-- Navigation links (hidden by default) -->
        <div id="myLinks">
            <a href="film.php">FILMS</a>
            <a href="musical.php" id="MusicalCurrentPage">MUSICALS</a>
            <a href="Concerten.php">CONCERTEN</a>
            <a href="events.php">EVENTS</a>
        </div>
        <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <header>
        <header class="Header">
            <div id="container">
                <div id="Sigma">
                    <a href="index.php" id="nav-color">
                        <h1>SIGMA MEDIA</h1>
                    </a>
                </div>
                <div id="nav-bar">
                    <a href="film.php" id="nav-color">
                        <h2>FILMS</h2>
                    </a>
                    <a>
                        <h2 id="nav-color">|</h2>
                    </a>
                    <a href="musical.php" id="nav-color">
                        <h2>MUSICALS</h2>
                    </a>
                    <a>
                        <h2 id="nav-color">|</h2>
                    </a>
                    <a href="Concerten.php" id="nav-color">
                        <h2>CONCERTEN</h2>
                    </a>
                    <a>
                        <h2 id="nav-color">|</h2>
                    </a>
                    <a href="events.php" id="nav-color">
                        <h2>EVENTS</h2>
                    </a>

                    </a>
                </div>
                <div id="login">
                    <a href="login.php" id="nav-color"> <img src="Img/admin.png" alt="Login_button">
                    </a>
                    <a href="shopping.php" id="nav-color"> <img src="Img/cart.png" alt="shopping_button">
                    </a>
                </div>
            </div>
        </header>


        <?php

        $sql = "SELECT * FROM orderitems";
        $result = $pdo->query($sql);
        $ordersql = $pdo->prepare("SELECT * FROM orderitems");
        $ordersql->execute();
        $orderarray = $ordersql->fetchAll(PDO::FETCH_OBJ);

        echo '<table class="tickets"> Tickets';
        echo "<tr> <td>Naam<td/> <td>Prijs<td/> <td> Aantal</td> <tr/> ";


        $totaal = 0;
foreach ($orderarray as $key) {
    $i = $key->prijs;
    // print_r($orderarray);
    $ticketprijs =  $key->prijs;
    $ticketaantal = $key->aantal;
    $totaal = $ticketprijs * $ticketaantal + $totaal;

    echo "<td>" . $key->ordernaam . "<td/>
        <td>" . "$" .  $key->prijs . "<td/>
        <td>" . ' <form action="shopping.php" method="post">
            <button  id="minknop"  name="minknop' . $i . '" >  
                <img src="Img/min.png" id="min">
            </button>' . $key->aantal  .
        '<button id="plusknop" name="plusknop' . $i . '" >
                <img src="Img/plus.png" id="plus"> 
            </button> 
        </form>' . "<td/> <tr/>";

    

    if (isset($_POST['plusknop' . $i])) {
        $updateplus = "UPDATE orderitems SET aantal = aantal + 1 WHERE orderID = :id";
        $stmtplus = $pdo->prepare($updateplus);
        $stmtplus->execute(['id' => $key->orderID]);
    }
    if (isset($_POST['minknop' . $i])) {
        if ($key->aantal <= 1) {
            $updatemin = "DELETE FROM orderitems WHERE orderID = :id";
            $stmtmin = $pdo->prepare($updatemin);
            $stmtmin->execute(['id' => $key->orderID]); 
        }
        $updatemin = "UPDATE orderitems SET aantal = aantal - 1 WHERE orderID = :id";
        $stmtmin = $pdo->prepare($updatemin);
        $stmtmin->execute(['id' => $key->orderID]);
    }
}

        echo "</table>";
        echo "<table>";
        echo "<tr> <td> Totaal Bedrag</td> <tr/> ";
        echo "<td>$ $totaal <td/> <tr/>";
        echo "</table>";

        // if (isset($_POST['plusknop'])) {
        //     $plusaantal = $ticketaantal + 1;
        //     $updateplus = "UPDATE orderitems SET aantal = :plusaantal WHERE orderID = :id";
        //     $stmtplus = $pdo->prepare($updateplus);
        //     $stmtplus->execute(['plusaantal' => $plusaantal, 'id' => $row["orderID"]]);
        //   }
        ?>
<script type="text/javascript">
    $('#contactForm').submit(function () {
       $.post("shopping.php",$("#contactForm").serialize(), function(data){
       });
        return false;
    });
</script>


        </div>
        <footer>
            <a href="contact.php" id="contact-color">
                <h2>Contact</h2>
            </a>
            <a id="contact-color">
                <h2>|</h2>
            </a>
            <a href="Hobby.html" id="contact-color">
                <h2>Sales</h2>
            </a>
        </footer>


</body>

</html>