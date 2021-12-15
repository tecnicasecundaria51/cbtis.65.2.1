<?php

require_once '../views/funcion.php';
session_start();
session_regenerate_id(true);

$eliminar = new Objeto();
$crud = new CRUD();
$conexion = Conexion::ConectarBD();

if (!isset($_SESSION['rol']) && $_SESSION['rol'] != 0) {
    header('locatin: ../views/login.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: ../views/login.php');
    }
}

if (isset($_POST['d'])) {
    $id = $_POST['id'];
    $eliminar->id = $id;
    $crud->After_Delete($eliminar);
    

}
header('refresh:5;url=../views/login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>ADMIN</title>
</head>

<body>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>