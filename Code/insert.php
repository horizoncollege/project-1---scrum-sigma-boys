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
$title = $_POST['title'];
$duration = $_POST['duur'];
$location = $_POST['locatie'];
$omschr = $_POST['omschrijving'];
$type = $_POST['media'];
$price = $_POST['price'];

$pdo = new PDO($dsn, $user, $pass);


$sql = "INSERT INTO tickets(ticketType, ticketName, Location, price, Duration, description)
  VALUES (?, ?, ?, ?, ?, ?);";

$stmt = $pdo->prepare($sql);

$stmt->execute([$type, $title, $location, $price, $duration, $omschr]);
header('Refresh:0; url=index.php');
?>
