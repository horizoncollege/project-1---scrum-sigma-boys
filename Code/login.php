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
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/login.css">
    <script src="javascript/Index.js"></script>
    <title>Sigma Media</title>
</head>

<body>
<div class="topnav">
        <a href="index.php" class="active">SIGMA MEDIA</a>
        <!-- Navigation links (hidden by default) -->
        <div id="myLinks">
            <?php if (!isset($_SESSION['loggedInUser'])) {
                echo '<h1 id= "nav-color">hallo gebruiker</h1>';
            }
            if (isset($_SESSION['loggedInUser'])) {
                echo '<h1 id= "nav-color"> Welkom ' . $_SESSION['user'] . '</h1>';
            }

            ?>
            <a href="film.php">FILMS</a>
            <a href="musical.php">MUSICALS</a>
            <a href="Concerten.php">CONCERTEN</a>
            <a href="events.php">EVENTS</a>
            <?php if (!isset($_SESSION['loggedInUser'])) {
                echo ' <a href="login.php">INLOGGEN</a>';
            }
            if (isset($_SESSION['loggedInUser'])) {
                echo ' <a href="logout.php" onClick="return confirmLogout()">UITLOGGEN</a>';
            }

            ?>

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
                <div id="nav-bar" class="menu">
                    <a href="film.php" class="menuItem" id="nav-color">
                        <h2>FILMS</h2>
                    </a>
                    <a>
                        <h2 class="line" id="nav-color">|</h2>
                    </a>
                    <a href="musical.php" class="menuItem" id="nav-color">
                        <h2>MUSICALS</h2>
                    </a>
                    <a>
                        <h2 class="line" id="nav-color">|</h2>
                    </a>
                    <a href="Concerten.php" class="menuItem" id="nav-color">
                        <h2>CONCERTEN</h2>
                    </a>
                    <a>
                        <h2 class="line" id="nav-color">|</h2>
                    </a>
                    <a href="events.php" class="menuItem" id="nav-color">
                        <h2>EVENTS</h2>
                    </a>

                    </a>
                </div>
                <!-- Hamburger -->
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
                <!-- show/hide login button -->
                <div id="login">
                    <?php if (!isset($_SESSION['loggedInUser'])) {
                        echo '<a href="login.php" id="login-Guest"> <img src="Img/admin.png" alt="Login_button">
                        </a>';
                    }
                    // Checks if logged in
                    if (isset($_SESSION['loggedInUser'])) {
                        $username = $_SESSION['user'];
                        $userquery = $pdo->prepare("SELECT * FROM users WHERE username = '$username'");
                        $userquery->execute();
                        $userAdmin = $userquery->fetch(PDO::FETCH_OBJ);

                        function getPoster()
                        {
                            global $userAdmin;
                            return $userAdmin->isAdmin;
                        }
                        $userAdminNumber = getPoster();
                        // checks user number and grats priveledges
                        if ($userAdminNumber == 2) {
                            echo '<h1 id="nav-color">' . $_SESSION['user'] . '
                        <div class="dropdown">
                        <img src="Img/admin.png" id="login" alt="Login_button">
                            <div class="dropdown-content">
                                <a href="logout.php" onClick="return confirmLogout()">uitloggen</a>
                                <a href="CreateEvent.php">create event</a>
                                <a href="addAdmin.php" id=FilmsCurrentPage >Add admin</a>
                            </div>
                        </div>';
                        } elseif ($userAdminNumber == 1) {
                            echo '<h1 id="nav-color">' . $_SESSION['user'] . '
                        <div class="dropdown">
                        <img src="Img/admin.png" id="login" alt="Login_button">
                            <div class="dropdown-content">
                                <a href="logout.php" onClick="return confirmLogout()">uitloggen</a>
                                <a href="CreateEvent.php">create event</a>  
                            </div>
                        </div>';
                        } elseif ($userAdminNumber == 0) {
                            echo '<h1 id="nav-color">' . $_SESSION['user'] . '
                            <div class="dropdown">
                            <img src="Img/admin.png" id="login" alt="Login_button">
                                <div class="dropdown-content">
                                    <a href="logout.php" onClick="return confirmLogout()">uitloggen</a>
                                </div>
                            </div>';
                        }
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

                </div>
                <!-- moving shopping card as required -->
                <?php if (!isset($_SESSION['loggedInUser'])) {
                    echo '<a href="shopping.php" id="mandje"> <img src="Img/cart.png" alt="shopping_button"></a>';
                }
                if (isset($_SESSION['loggedInUser'])) {
                    echo '<a href="shopping.php" id="mandje-user"> <img src="Img/cart.png" alt="shopping_button"></a>';
                }

                ?>
            </div>
        </header>
    <Form id="Formcontainer" method="post">
        <input type="text" id=lettters name="name" placeholder="gebruikersnaam" required>
        <input type="password" id=lettters name="pass" placeholder="Wachtwoord" required>
        <input type="submit" id=inloggen name="login" value="Inloggen" required>
        <a href="registratie.php" id=create>nog geen account? <span>account aanmaken</span> </a>
    </Form>
    <?php
    // aquires input/database information
    if (isset($_POST['name']) && isset($_POST['pass'])) {
        $username = $_POST['name'];
        $password = $_POST['pass'];
        $query = $pdo->query("SELECT * FROM users WHERE username = '$username' AND wachtwoord = '$password' ");
        $user = $query->fetch();
        // checks if input = database
        if ($user !== false) {
            $_SESSION['loggedInUser'] = $user['username'];
        } else {
            $_SESSION['error'] = "<h1 id=denied>Gebruikersnaam of wachtwoord is ongeldig. </h1>";
            echo '<script>alert("wrong Username or password")</script> ';
        }
    }
    // check if session is active and sends user to index
    if (isset($_SESSION['loggedInUser'])) {
        echo $_SESSION['user'] = $username;
        header("Refresh:0; url=index.php");
    }
    ?>
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