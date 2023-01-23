<?php

$host = 'localhost';
$db   = 's168308_project';
$user = 's168308_Project';
$pass = 'Pr0ject';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// shows version of the database
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/login    .css">
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
                    <h2 id="MusicalCurrentPage">MUSICALS</h2>
                </a>
                <a>
                    <h2 id="nav-color">|</h2>
                </a>
                <a href="Concerten.php" id="nav-color">
                    <h2 id="ConcertenCurrentPage">CONCERTEN</h2>
                </a>
                <a>
                    <h2 id="nav-color">|</h2>
                </a>
                <a href="events.php" id="nav-color">
                    <h2>EVENTS</h2>
                </a>

                </a>
            </div>
        </div>


    </header>
    <Form id="Formcontainer" method="POST">
        <input type="text" id=lettters name="user" placeholder="gebruikersnaam" required>
        <input type="email" id=lettters name="email" placeholder="Email-adres " required>
        <input type="text" id=lettters name="pass" placeholder="Wachtwoord" required>
        <input type="submit" id=inloggen name="Create" value="Account aanmaken">
    </Form>
    <?php
    if (isset($_POST['Create'])) {
        $name = $_POST['user'];
        $password = $_POST['pass'];
        $email = $_POST['email'];

        $pdo = new PDO($dsn, $user, $pass);

        $sql = "INSERT INTO users (username, wachtwoord, isAdmin ,emailAddress)
            VALUES(?,?,0,?);";

        $Stmt = $pdo->prepare($sql);

        $Stmt->execute([$name, $password, $email]);
        echo "<h1 id=letters>Account Created </h1>";
        header('Refresh:1; url=login.php');
    }
    ?>
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