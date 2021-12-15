<?php
require_once 'funcion.php';
session_start();
session_regenerate_id(true);
error_reporting(0);

if (!isset($_SESSION['rol']) && $_SESSION['rol'] != 0) {
    header('locatin: login.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: login.php');
    }
}
$publicacion = new Objeto();
$crud = new CRUD();
$Conexion = Conexion::ConectarBD();

if (isset($_POST['submit'])) {
    $title = isset($_POST['title']) ? mysqli_real_escape_string($Conexion, $_POST['title']) : false;
    $contenido = isset($_POST['contenido']) ? mysqli_real_escape_string($Conexion, $_POST['contenido']) : false;
    $url = isset($_POST['url']) ? mysqli_real_escape_string($Conexion, trim($_POST['url'])) : false;
    $rol = isset($_POST['id_rol']) ? mysqli_real_escape_string($Conexion, $_POST['id_rol']) : false;

    if (isset($_FILES['foto']['name'])) {
        $tipo = $_FILES['foto']['type'];
        $nombre = $_FILES['foto']['name'];
        $tamano = $_FILES['foto']['size'];
        $imagensub = fopen($_FILES['foto']['tmp_name'], 'r');
        $imagenbin = fread($imagensub, $tamano);
        $imagenbin = mysqli_escape_string($Conexion, $imagenbin);

        $publicacion->title = $title;
        $publicacion->nombre = $nombre;
        $publicacion->contenido = $contenido;
        $publicacion->url = $url;
        $publicacion->tipo = $tipo;
        $publicacion->imagenbin = $imagenbin;
        $publicacion->rol = $rol;
        $crud->pub_admin($publicacion);
    }
}
header('refresh:5;url=login.php');
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