<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['rol']) && $_SESSION['rol'] != 0) {
    header('locatin: login.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESC</title>
</head>

<body>
    <a href="../logout.php">
        <h1>cerrar sesion</h1>
    </a>
    hola esc <?= $_SESSION['rol'] ?>

</body>

</html>