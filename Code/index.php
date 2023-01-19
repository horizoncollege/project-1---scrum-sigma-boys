<?php

session_start();

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
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/index.css">
    <script src="javascript/Index.js"></script>
    <title>Sigma Media</title>
</head>

<body>
    <header>
        <header class="Header">
            <div id="container">
                <div id="Sigma">
                    <a href="index.php" id="nav-color">
                        <h1>SIGMA MEDIA</h1>
                    </a>
                </div>
                <div id="nav-bar" class="menu">
                    <a href="film.php" class="menuItem" id="nav-color">
                        <h2>FILMS</h2>
                    </a>
                    <a>
                        <h2 id="nav-color">|</h2>
                    </a>
                    <a href="musical.php" class="menuItem" id="nav-color">
                        <h2>MUSICALS</h2>
                    </a>
                    <a>
                        <h2 id="nav-color">|</h2>
                    </a>
                    <a href="Concerten.php" class="menuItem" id="nav-color">
                        <h2>CONCERTEN</h2>
                    </a>
                    <a>
                        <h2 id="nav-color">|</h2>
                    </a>
                    <a href="events.php" class="menuItem" id="nav-color">
                        <h2>EVENTS</h2>
                    </a>

                    </a>
                </div>
                <!-- Hamburger -->
                <button class="hamburger">
                    <!-- material icons https://material.io/resources/icons/ -->
                    <i class="menuIcon material-icons">menu</i>
                    <i class="closeIcon material-icons">close</i>
                </button>
                <!-- show/hide login button -->
                <div id="login">
                    <?php if (!isset($_SESSION['loggedInUser'])) {
                        echo '<a href="login.php" id="nav-color"> <img src="Img/admin.png" alt="Login_button">
                        </a>';
                    }
                    if (isset($_SESSION['loggedInUser'])) {
                        echo '<h1 id="nav-color">' . $_SESSION['user'] . '</h1>
                        <a href="logout.php" id="log" onClick="return confirmLogout()"> <img src="Img/admin.png" alt="Login_button">
                        </a>';
                    }

                    ?>
                    <!-- log out confirmation -->
                    <script language="JavaScript">
                        function confirmLogout() {

                            if (!confirm("Are you sure you want to log out?")) {

                                return false;

                            }
                        }
                    </script>
                    <a href="shopping.php" id="nav-color"> <img src="Img/cart.png" alt="shopping_button">
                    </a>
                </div>

            </div>


        </header>
        <div id="body">
            <a href="Hobby.html" id="body-color"> <img src="Img/placeholder.png" alt="shopping_button" id="img-border">
            </a>
            <a href="Hobby.html" id="body-color"> <img src="Img/placeholder.png" alt="shopping_button" id="img-border">
            </a>
            <a href="Hobby.html" id="body-color"> <img src="Img/placeholder.png" alt="shopping_button" id="img-border">
            </a>
            <a href="Hobby.html" id="body-color"> <img src="Img/placeholder.png" alt="shopping_button" id="img-border">
            </a>
        </div>
        <footer contentEditable>
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