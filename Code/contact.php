<?php

$host = 'localhost';
$db   = 's168308_Project';
$user = 's168308_Project';
$pass = 'Pr0ject';
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

if (isset($_POST['verzenden'])) {
    $naam = $_POST['contactnaam'];
    $email = $_POST['contactemail'];
    $bericht = $_POST['contactbericht'];

    $pdo = new PDO($dsn, $user, $pass);

    contact($naam, $email, $bericht, $pdo);
}

session_start();

function contact($naam, $email, $bericht, $pdo)
{
    $sql = "INSERT INTO contact(naam, email, bericht)
        VALUES (?, ?, ?);";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$naam, $email, $bericht]);

    header('Refresh:1; url=contactontvangen.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/contact.css">
    <script src="javascript/Index.js"></script>1q
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
    <form id="contactform" method="post">
        <div id="top">
            <input type="text" id="InputTop" name="contactnaam" placeholder="Vul hier uw naam in">
            <input type="email" id="InputTop" name="contactemail" placeholder="Vul hier uw email-adress in">
        </div>
        <div id="center">
            <textarea name="contactbericht" id="InputCenter" cols="30" rows="10" placeholder="Vul hier uw bericht in..."></textarea>
        </div>
        <div id="bottem">
            <h3 id="Inputbottem"> wij zijn telefonish bereikbaar op +06 8008135</h3>
            <input type="submit" id="Inputbottem" value="verzenden" name="verzenden">
        </div>
    </form>
    <footer>
        <a href="contact.php" id="contact-color">
            <h2>Contact</h2>
        </a>
        <a id="contact-color">
            <h2>|</h2>
        </a>
        <a href="index.php" id="contact-color">
            <h2>Sales</h2>
        </a>
    </footer>
</body>

</html>