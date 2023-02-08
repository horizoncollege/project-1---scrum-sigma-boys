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

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/Main.css">
    <script src="javascript/Index.js"></script>
    <title>Sigma Media</title>
</head>

<body>

    <!-- Top Navigation Menu -->
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
            <a href="events.php" id="EventsCurrentPage">EVENTS</a>
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
                    <a href="events.php" class="menuItem"  id="EventsCurrentPage">
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
                        if ($userAdminNumber == 1) {
                            echo '<h1 id="nav-color">' . $_SESSION['user'] . '
                        <div class="dropdown">
                        <img src="Img/admin.png" id="login" alt="Login_button">
                            <div class="dropdown-content">
                                <a href="logout.php" onClick="return confirmLogout()">uitloggen</a>
                                <a href="CreateEvent.php">create event</a>
                                <a href="testing">Add admin</a>
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
                <?php if (!isset($_SESSION['loggedInUser'])) {
                    echo '<a href="shopping.php" id="mandje"> <img src="Img/cart.png" alt="shopping_button">';
                }
                if (isset($_SESSION['loggedInUser'])) {
                    echo '<a href="shopping.php" id="mandje-user"> <img src="Img/cart.png" alt="shopping_button">';
                }

                ?>
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
        <h3>
            <a href="seeEvents.php" id="SeeMoreStyle"> <img src="Img/arrow.png" alt="shopping_button" id="SeeMoreImg">
            </a>
        </h3>
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