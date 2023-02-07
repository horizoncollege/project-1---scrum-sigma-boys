<?php
$id = $_GET['id'];

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


//check everything from db
$query = $pdo->prepare('SELECT * FROM tickets WHERE id = :id');
$query->bindParam(':id', $id);
$query->execute();

$ticket = $query->fetch(PDO::FETCH_OBJ);

function getTitle()
{
    global $ticket;
    return $ticket->ticketName;
}

function getPrice()
{
    global $ticket;
    return $ticket->price;
}

function getDuration()
{
    global $ticket;
    return $ticket->duration;
}

function getLocation()
{
    global $ticket;
    return $ticket->Location;
}

function getTicketType()
{
    global $ticket;
    return $ticket->ticketType;
}

function getDescription()
{
    global $ticket;
    return $ticket->description;
}

function getPoster()
{
    global $ticket;
    return $ticket->poster;
}

function getDatum()
{
    global $ticket;
    return $ticket->datum;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/detail.css">
    <script src="javascript/Index.js"></script>
    <title>Sigma Media</title>
</head>

<body>
    <header>
        <header class="Header">
            <div id="container">
                <div id="Sigma">
                    <a href="index.php" id="nav-color">
                        <h1 id="Titel">SIGMA MEDIA</h1>
                    </a>
                </div>
                <div id="nav-bar">
                    <a href="film.php" id="nav-color">
                        <h2 id="Titel">FILMS</h2>
                    </a>
                    <a>
                        <h2 id="nav-color">|</h2>
                    </a>
                    <a href="musical.php" id="nav-color">
                        <h2 id="Titel">MUSICALS</h2>
                    </a>
                    <a>
                        <h2 id="nav-color">|</h2>
                    </a>
                    <a href="Concerten.php" id="nav-color">
                        <h2 id="Titel">CONCERTEN</h2>
                    </a>
                    <a>
                        <h2 id="nav-color">|</h2>
                    </a>
                    <a href="events.php" id="nav-color">
                        <h2 id="Titel">EVENTS</h2>
                    </a>

                    </a>
                </div>
                <div id="login">
                    <a href="login.php" id="nav-color"> <img src="Img/admin.png" alt="Login_button">
                    </a>
                    <a href="Hobby.html" id="nav-color"> <img src="Img/cart.png" alt="shopping_button">
                    </a>
                </div>

            </div>
        </header>

        <div id="deBetereContainer">
            <h1 id="ticketTitel"><?php echo getTitle() ?></h1>
            <div id="detailItems">
                <div id="imagePlacing">
                    <img class="poster" src="Img/<?php echo getPoster() ?>" alt="shopping_button" id="img-border">
                </div>
                <div id="textPlacing">
                    <p>Prijs:</p>
                    <p id="ticketDetails">€<?php echo getPrice(); ?> euro</p> <br>
                    <p>Duur:</p>
                    <p id="ticketDetails"><?php echo getDuration(); ?></p><br>
                    <p>Locatie: </p>
                    <p id="ticketDetails"><?php echo getLocation(); ?></p><br>
                    <p>Datum: </p>
                    <p id="ticketDetails"><?php echo getdatum(); ?>
                </div>
                <br><br>

                <div id="gettingDescriptionMargin">
                    <p> beschrijving:</p>
                    <p id="ticketDetails" class="beschrijving"><?php echo getDescription() ?></p> <br>
                </div>

            </div>
        </div>

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