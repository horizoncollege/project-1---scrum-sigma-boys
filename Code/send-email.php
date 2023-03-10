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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $to = $_POST['email'];
  $subject = "Inlog gegevens";
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $message = "Beste Mevrouw/Meneer" . PHP_EOL . PHP_EOL .
    "Wat fijn dat u bij ons een account heeft aangemaakt" . PHP_EOL .
    "Hierbij verzenden wij uw contact gegevens " . PHP_EOL . PHP_EOL .
    "Uw gebruikersnaam: " . $user . PHP_EOL .
    "Uw wachtwoord: " . $pass . PHP_EOL .  PHP_EOL . PHP_EOL .
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
  <link rel="stylesheet" href="style/login.css">
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
    <a href="Hobby.html" id="contact-color">
      <h2>Sales</h2>
    </a>
  </footer>
</body>

</html>