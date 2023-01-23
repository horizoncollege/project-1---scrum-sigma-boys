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
    <link rel="stylesheet" href="style/login.css">
    <script src="javascript/Index.js"></script>
    <title>Sigma Media</title>
</head>

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
    <Form id="Formcontainer" method="post">
        <input type="text" id=lettters name="name" placeholder="Email-adres of gebruikersnaam">
        <input type="text" id=lettters name="pass" placeholder="Wachtwoord">
        <input type="submit" id=inloggen name="login" value="Inloggen">
        <a href="registratie.php" id=create>nog geen account? <span>account aanmaken</span> </a>
    </Form>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $gebruikers = $stmt->fetch(PDO::FETCH_OBJ);

    function getUsername()
    {
        global $gebruikers;
        return  $gebruikers->username;
    }
    function getEmail()
    {
        global $gebruikers;
        return $gebruikers->emailAddress;
    }
    function getPassword()
    {
        global $gebruikers;
        return $gebruikers->wachtwoord;
    }

    $user = getUsername();
    $ww = getPassword();
    $email = getEmail();
    if (isset($_POST["login"])) {
        $username = $_POST['name'];
        $password = $_POST['pass'];
        if ($username == $user && $password == $ww) {
            $_SESSION['userlogin'] = $username;
        } else {
            echo "<h1 id='denied'>Invalide gebruikersnaam of wachtwoord combinatie</h1>";
        }
    }



    if (isset($_SESSION['userlogin'])) {
        echo "<h1 id='denied'>welcome $user</h1>";
        header("Refresh:1; url=index.php");
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