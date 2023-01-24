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

$stmt = $pdo->prepare("SELECT * FROM tickets where ticketType='CONCERT'");
$stmt->execute();
$film_array = $stmt->fetchAll(PDO::FETCH_OBJ);

function echoFilms()
{
    global $film_array;
    foreach ($film_array as $key) {
        echo
        '<tr>
            <td>';
        echo $key->ticketName;
        echo '</td>
            <td>';
        echo $key->Location;
        echo '</td>
            <td><a class="details" href="detailPaginas.php?id=';
        echo $key->id;
        echo '">details</a></td>
        </tr>';
    }
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

    <div class="topnav">
        <a href="index.php" class="active">Sigma media</a>
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
            <a href="musical.php" >MUSICALS</a>
            <a href="Concerten.php" id="ConcertenCurrentPage">CONCERTEN</a>
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
                <div id="login">
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
                        <a href="Hobby.html" id="nav-color"> <img src="Img/cart.png" alt="shopping_button">
                        </a>
                        <script language="JavaScript">
                            function confirmLogout() {

                                if (!confirm("Are you sure you want to log out?")) {

                                    return false;

                                }
                            }
                        </script>
                    </div>

                </div>


        </header>
        <table>
            <tr>
                <th>title</th>
                <th>location</th>
                <th>More details</th>
            </tr>

            <tr>
                <?php echofilms($stmt); ?>
            </tr>
        </table>

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