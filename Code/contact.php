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

if (isset($_POST['verzenden'])) {
    contact($naam, $email, $bericht, $pdo, $dsn, $user, $pass);
}

function contact($naam, $email, $bericht, $pdo, $dsn, $user, $pass)
{
    $naam = $_POST['contactnaam'];
    $email = $_POST['contactemail'];
    $bericht = $_POST['contactbericht'];

    $pdo = new PDO($dsn, $user, $pass);


    $sql = "INSERT INTO contact(naam, email, bericht)
        VALUES (?, ?, ?);";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$naam, $email, $bericht]);

    header('Refresh:1; url=contactontvangen.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = $_POST['contactemail'];
    $subject = "Contact";
    $user = $_POST['contactnaam'];
    
    $message = "'Beste " . $user . PHP_EOL . PHP_EOL .
    "We hebben uw bericht ontvangen, Hierbij bevestigen wij dat we er mee aan de slag gaan." . PHP_EOL .
    "We sturen zo spoedig mogelijk een mail terug." . PHP_EOL . PHP_EOL . 
    "Met vriendelijke groetjes Sigma media";
  
    $headers = "From: sigmamedia1@outlook.com";
  
    $success = mail($to, $subject, $message, $headers);
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
    <link rel="stylesheet" href="style/Main.css">
    <script src="javascript/contact.js"></script>
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
    <a href="film.php" id=FilmsCurrentPage>FILMS</a>
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
            <a href="film.php" id=FilmsCurrentPage class="menuItem" id="nav-color">
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
            <a href="Concerten.php"  class="menuItem" id="nav-color">
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
            <?php if (!isset($_SESSION['loggedInUser'])) {
                echo '<a href="login.php" id="nav-color"> <img src="Img/admin.png" alt="Login_button">
                </a>';
            }
            // Checks login status
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
                // Checks Users number and gives them the Priveledges
                if ($userAdminNumber == 2) {
                    echo '<h1 id="nav-color">' . $_SESSION['user'] . '
                <div class="dropdown">
                <img src="Img/admin.png" id="login" alt="Login_button">
                    <div class="dropdown-content">
                        <a href="logout.php" onClick="return confirmLogout()">uitloggen</a>
                        <a href="CreateEvent.php">create event</a>
                        <a href="addAdmin.php">Add admin</a>
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
            </a>
            <script language="JavaScript">
                function confirmLogout() {

                    if (!confirm("Are you sure you want to log out?")) {

                        return false;

                    }
                }
            </script>
        </div>
        <!-- Checks if user or not for diffrent styling -->
        <?php if (!isset($_SESSION['loggedInUser'])) {
            echo '<a href="shopping.php" id="mandje-user-contact"> <img src="Img/cart.png" alt="shopping_button"></a>';
        }
        if (isset($_SESSION['loggedInUser'])) {
            echo '<a href="shopping.php" id="mandje-user-contact"> <img src="Img/cart.png" alt="shopping_button"></a>';
        }
?>
    </div>


</header>
        <form id="contactform" method="post">
            <div id="top">
                <input type="text" id="inputtop" name="contactnaam" placeholder="Vul hier uw naam in" required>
                <input type="email" id="inputtop" name="contactemail" placeholder="Vul hier uw email-adress in" required>
            </div>
            <div id="center">
                <textarea name="contactbericht" id="inputcenter" cols="30" rows="10" placeholder="Vul hier uw bericht in..." required></textarea>
            </div>
            <div id="bottem">
                <h3 id="inputbottem"> wij zijn telefonish bereikbaar op +06 8008135</h3>
                <input type="submit" id="inputbottem" class="contactknop" value="verzenden" name="verzenden" onclick="contactalert()">
            </div>
        </form>
        <footer>
            <a href="contact.php" id=ContactCurrentPage id="contact-color">
                <h2>Contact</h2>
            </a>
            <a id="contact-color" >
                <h2>|</h2>
            </a>
            <a href="Sales.php" id="contact-color">
                <h2>Sales</h2>
            </a>
        </footer>
</body>

</html>