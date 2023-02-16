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
$id = $_GET['id'];




$aantal = 1;

$query = $pdo->prepare('SELECT * FROM tickets WHERE id = :id');
$query->bindParam(':id', $id);
$query->execute();
$winkel = $query->fetch(PDO::FETCH_OBJ);

$naam = $winkel->ticketName;
$prijs = $winkel->price;

$sql = "INSERT INTO orderitems (ordernaam, prijs, aantal) 
VALUES (:naam, :prijs, :aantal)";
//prepare SQL statement
$stmt = $pdo->prepare($sql);
//bind parameters 
$stmt->bindParam(':naam', $naam);
$stmt->bindParam(':prijs', $prijs);
$stmt->bindParam(':aantal', $aantal);
//execute statement
$stmt->execute();

header('Refresh:0; url=shopping.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/contact.css?1">
    <title>Ontvangen</title>

<body>
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
    <h1 id="ontvangen">
        Moment geduld
    </h1>
    <footer>
        <a href="contact.php" id="contact-color">
            <h2>Contact</h2>
        </a>
        <a id="contact-color">
            <h2>|</h2>
        </a>
        <a href="Sales.php" id="contact-color">
            <h2>Sales</h2>
        </a>
    </footer>
</body>

</html>