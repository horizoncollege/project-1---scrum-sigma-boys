<link rel="stylesheet" href="style.css?v=<?php echo rand(); ?>">
<?php

$id = $_GET['id'];

$host = 'localhost';
$db   = 's168308_project';
$user = 's168308_Project';
$pass = 'Pr0ject';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    echo 'error connecting to database: ' . $e->getMessage();
}
// changes isAdmin number within the Database
$priveledge = 1;
$stmt = $pdo->prepare('SELECT * FROM users WHERE userID = :id');
$stmt->bindParam(':id', $id);
$stmt->execute();
$sql = "UPDATE users SET isAdmin = ? WHERE userID = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$priveledge, $id]);

        $film = $stmt->fetch(PDO::FETCH_OBJ);

        header("Location: addAdmin.php");
?>