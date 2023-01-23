<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1> je bent uitgelogd</h1>
    <?php 
    session_start();
    session_unset();
    header("Refresh:0; url=index.php");

    ?>
</body>
</html>