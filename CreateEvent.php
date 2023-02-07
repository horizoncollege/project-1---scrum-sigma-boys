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
    <link rel="stylesheet" href="style/main.css">
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
                    if (isset($_SESSION['loggedInUser'])) {
                        echo '<h1 id="nav-color">' . $_SESSION['user'] . '
                        <div class="dropdown">
                        <img src="Img/admin.png" id="login" alt="Login_button">
                            <div class="dropdown-content">
                                <a href="logout.php" onClick="return confirmLogout()">uitloggen</a>
                                <a href="#">create event</a>
                                <a href="#">Add admin</a>
                            </div>
                        </div>';
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
                    <?php if (!isset($_SESSION['loggedInUser'])) {
                        echo '<a href="shopping.php" id="mandje"> <img src="Img/cart.png" alt="shopping_button">';
                    }
                    if (isset($_SESSION['loggedInUser'])) {
                        echo '<a href="shopping.php" id="mandje-user"> <img src="Img/cart.png" alt="shopping_button">';
                    }

                    ?>
                </div>

            </div>


        </header>
        <div id="body">

            <?php
            $host = 'localhost';
            $dbname = 'netland';
            $user = 'root';
            $pass = '';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
            ?>

            <a href="index.php" id=terug>Terug</a>
            <br></br>
            <h1>Nieuwe media</h1>
            <br></br>
            <form method="post" action="insert.php">
                <label for="title">Titel</label>
                <input type="text" name="title">
                <br></br>
                <label for="duur">Rating</label>
                <input type="duur" name="rating">
                <br></br>
                <label for="omschrijving">Omschrijving</label>
                <textarea name="omschrijving" cols="30" rows="10"></textarea>
                <br></br>
                <label for="award">Aantal awards</label>
                <input type="award" name="award">
                <br></br>
                <label for="duur">length_in_minutes</label>
                <input type="duur" name="duur">
                <br></br>
                <label for="datum_uitkomst">Datum van uitkomst</label>
                <input type="date" name="datum">
                <br></br>
                <label for="seasons">Seizoenen</label>
                <input type="text" name="seasons">
                <br></br>
                <label for="land_uitkomst">Land van uitkomst</label>
                <input type="text" name="land" placeholder="2 letter afkorting">
                <br></br>
                <label for="trailer_id">Taal</label>
                <input type="text" name="lang" placeholder="2 letters only">
                <br></br>
                <label for="trailer_id">Trailer id</label>
                <input type="text" name="trailer_id">
                <br></br>
                <label for="media">type media:</label>
                <select id="media" name="media">
                    <option value="serie">serie</option>
                    <option value="film">film</option>
                </select>
                <input type="submit" value="Create" id="create" name="Create">
            </form>
            <?php
            if (isset($_POST['Create'])) {
                $title = $_POST['title'];
                $duur = $_POST['duur'];
                $datum = $_POST['datum'];
                $land = $_POST['land'];
                $omschr = $_POST['omschrijving'];
                $trailer_id = $_POST['trailer_id'];
                $type = $_POST['media'];
                $rating = $_POST['rating'];
                $awards = $_POST['award'];
                $seasons = $_POST['seasons'];
                $lang = $_POST['lang'];

                $pdo = new PDO($dsn, $user, $pass);

                if ($type == "film") {
                    InsertFilm($title, $duur, $datum, $land, $omschr, $trailer_id, $type, $pdo);
                } elseif ($type == "serie") {
                    InsertSerie($title, $rating, $omschr, $awards, $seasons, $land, $lang, $type, $pdo);
                } else {
                    echo "Mission failed";
                }
            }

            function InsertFilm($title, $duur, $datum, $land, $omschr, $trailer_id, $type, $pdo)
            {
                $sql = "INSERT INTO media(title, length_in_minutes, released_at, country, summary, youtube_trailer_id, soort)
  VALUES (?, ?, ?, ?, ?, ?,?);";

                $stmt = $pdo->prepare($sql);

                $stmt->execute([$title, $duur, $datum, $land, $omschr, $trailer_id, $type]);
                echo "<h1>Film downloaded </h1>";
                header('Refresh:1; url=index.php');
            }
            function InsertSerie($title, $rating, $omschr, $awards, $seasons, $land, $lang, $type, $pdo)
            {
                $sql = "INSERT INTO media (title, rating, summary, has_won_awards, seasons, country, spoken_in_language, soort)
  VALUES (?,?,?,?,?,?,?,?);";

                $stmt = $pdo->prepare($sql);

                $stmt->execute([$title, $rating, $omschr, $awards, $seasons, $land, $lang, $type]);
                echo "<h1>serie downloaded </h1>";
                header('Refresh:1; url=index.php');
            }


            ?>
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